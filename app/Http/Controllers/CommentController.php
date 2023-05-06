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
            'comments' => Comment::all(),
        ]);
    }

    //show comment
    public function show(int $productId)
    {
        return Comment::where('product_id', '=', $productId)->orderBy('created_at', 'desc');
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

        // $listComments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')
        //                         ->where('comments.product_id',  $request->productId)
        //                         ->orderBy('created_at', 'desc')
        //                         ->select('comments.*', 'users.name as user_name')->get();

        // return Response::json([
        //     'status' => 'success',
        //     'message' => 'Thêm bình luận thành công!',
        //     'comments' => $listComments,
        //     'userLogin'  => $request->userId,
        //     'productId'  => $request->productId,
        // ]);
    }
}
