@extends('admin.dashboard')
@section('content')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Danh sách bình luận</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">       
        
                                        <div class="table-rep-plugin" id="tableComment">
                                            
                                                @include('admin.comment.listComment')
        
                                        </div>
        
                                    </div>

                                    <script>
                                    function changePage(page){
                                        $.ajax({
                                            url: "/admin/comment",
                                            type: "POST",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "page": page,
                                            },
                                            success: function(response){
                                                if(response.status === "success"){
                                                    $('#tableComment').html(response.html);
                                                    window.scrollTo(0, 0);
                                                }
                                            },
                                            error: function(response){
                                                if (response.status === 'error') {
                                                    // alert(response.message)
                                                }
                                            }, 
                                        });    
                                    }
                                    </script>

                                    <style>
                                    .page-item.active .page-link {
                                        z-index: 3;
                                        color: #fff;
                                        background-color: #252b3b !important;
                                        border-color: #252b3b !important;
                                    }
                                    .page-link:hover {
                                        color: #252b3b !important;
                                    }
                                    td.content{
                                        max-width: 300px;
                                        white-space: normal;
                                    }
                                    td.user{
                                        max-width: 100px;
                                        white-space: normal;
                                    }
                                    td.title{
                                        max-width: 200px;
                                        white-space: normal;
                                    }
                                    </style>
                                    <script>
                                    //update comment
                                    function updateStatusComment(commentId, status, page){
                                        $.ajax({
                                            url: "/admin/comment",
                                            type: "PUT",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "commentId": commentId,
                                                "status": status,
                                                "page": page,
                                            },
                                            success: function(response){
                                                if(response.status === "success"){
                                                    $('#tableComment').html(response.html);
                                                }
                                            },
                                            error: function(response){
                                                if (response.status === 'error') {
                                                    alert(response.message)
                                                }
                                            },
                                        });
                                    }
                                    
                                    </script>

                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
@endsection                
