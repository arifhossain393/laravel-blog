@extends('layouts.backend.app')
@section('title', 'Pending Post')
@push('css')
     <!-- JQuery DataTable Css -->
     <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
     <style>
            .btn.btn-primary.tag {
                width: 130px;
                float: right;
                margin-top: -23px;
                margin-right: 20px;
            }
            .btn.btn-primary.tag a {
                color: #fff;
                font-weight: bold;
            }
        </style>
@endpush
@section('content')
    <div class="container-fluid">
       <!-- Exportable Table -->
       <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Post List
                            <span class="badge bg-blue">{{ $posts->count() }}</span>
                        </h2>
                        <div class="btn btn-primary tag"><a href="{{route('admin.post.create')}}">Add New Post</a></div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Author Name</th>
                                        <th>view Count</th>
                                        <th>Status</th>
                                        <th>Approve</th>
                                        <th>date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Author Name</th>
                                        <th>view Count</th>
                                        <th>Status</th>
                                        <th>Approve</th>
                                        <th>date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                      $sl = 0;  
                                    @endphp
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ str_limit($post->title, 15) }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->view_count }}</td>
                                        <td>
                                            @if($post->status == true)
                                                <span class="badge bg-blue">Published</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->is_approved == true)
                                                <span class="badge bg-blue">Approved</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.post.approve', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="is_approved">
                                                <button type="submit" class="btn btn-primary"><i class="material-icons">check_circle_outline</i></button>
                                            </form>
                                                <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-primary"><i class="material-icons">visibility</i></a>
                                            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-primary"><i class="material-icons">edit</i></a>
                                            {{-- <a href="" class="btn btn-info"><i class="material-icons">view</i></a> --}}
                                            <button type="button" class="btn btn-danger" onclick="deletePost({{ $post->id }})"><i class="material-icons">delete</i></button>
                                                <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy', $post->id) }}" method="POST" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                 
                                           
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection
@push('js')
<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function deletePost(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
               
            } else {
                swal("Your data is safe!");
            }
            });
    }
    
</script>
@endpush

