<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CommentController extends Controller
{
    //show comment list admin
    public function index()
    {
        return view('admin.comment.showComment',[
            'comments' => Comment::orderBy('created_at', 'desc')->paginate(12),
            'page' => 1,
        ]);
    }

    //change page
    public function changePage(Request $request)
    {

        $view = view('admin.comment.listComment', [
            'comments' => Comment::orderBy('created_at', 'desc')
                            ->paginate(12, ['*'], 'page', $request->page),
            'page' => $request->page,

            ])->render();
        
        return Response::json([
            'status' => 'success',
            'message' => 'Chuyển trang thành công',
            'html' => $view,
        ]);
    }

    //update status
    public function updateStatus(Request $request)
    {
        Comment::where('id', '=', $request->commentId)->update([
            'status' => $request->status,
        ]);

        $view = view('admin.comment.listComment',[
            'comments' => Comment::orderBy('created_at', 'desc')
                            ->paginate(12, ['*'], 'page', $request->page),
            'page' => $request->page,
        ])->render();

        return Response::json([
            'status' => 'success',
            'message' => 'Cập nhật trạng thái bình luận thành công!',
            'html' => $view,
        ]);
    }

    //show comment
    public function show(int $productId)
    {
        return Comment::where('product_id', '=', $productId)
                        ->orderBy('created_at', 'desc')
                        ->where('status', '=', 0);
    }

    //load more
    public function loadMore(Request $request)
    {
        $page = $request->page;

        $paginationComment = $this->show($request->productId)->paginate(3, ['*'], 'page', $request->page);

        if ($paginationComment->lastPage() == $request->page) {
            $page = 'max';
        }

        $view = view('pages.detail.commentList', [
            'commentList' => $paginationComment,
            'productId' => $request->productId,
            ])->render();

        return Response::json([
            'status' => 'success',
            'message' => 'Thêm bình luận thành công!',
            'html' => $view,
            'page' => $page,
        ]);
    }

    //add comment
    public function store(Request $request)
    {
        Comment::create([
            'content' => $request->content,
            'user_id' => $request->userId,
            'product_id' => $request->productId,
        ]);

        $paginationComment = $this->show($request->productId)->paginate(3, ['*'], 'page', $request->page);
        
        $view = view('pages.detail.comment', [
            'commentList' => $this->show($request->productId)->paginate(3),
            'productId' => $request->productId,
            'commentTotal' => $paginationComment->total(),
            ])->render();

        return Response::json([
            'status' => 'success',
            'message' => 'Thêm bình luận thành công!',
            'html' => $view,
        ]);
    }

    public function delete(Request $request)
    {
        Comment::find($request->commentId)->delete();

        $paginationComment = $this->show($request->productId)->paginate(3, ['*'], 'page', $request->page);

        $view = view('pages.detail.comment', [
            'commentList' => $this->show($request->productId)->paginate(3),
            'productId' => $request->productId,
            'commentTotal' => $paginationComment->total(),
            ])->render();

        return Response::json([
            'status' => 'success',
            'message' => 'Thêm bình luận thành công!',
            'html' => $view,
        ]);
    }
}
