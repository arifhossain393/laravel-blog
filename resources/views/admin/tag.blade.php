@extends('layouts.backend.app')
@section('title', 'Tags')
@push('css')
     <!-- JQuery DataTable Css -->
     <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
     <style>
            .btn.btn-primary.tag {
                width: 80px;
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
                            Tag List
                            <span class="badge bg-blue">{{ $tags->count() }}</span>
                        </h2>
                        <div class="btn btn-primary tag"><a href="{{route('admin.tag.create')}}">Add Tag</a></div>
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
                                        <th>Name</th>
                                        <th>Posts Count</th>
                                        <th>Slug</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Posts Count</th>
                                        <th>Slug</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                      $sl = 0;  
                                    @endphp
                                    @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->posts->count() }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>{{ $tag->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-primary"><i class="material-icons">edit</i></a>
                                            {{-- <a href="" class="btn btn-info"><i class="material-icons">view</i></a> --}}
                                            <button type="button" class="btn btn-danger" onclick="deleteTag({{ $tag->id }})"><i class="material-icons">delete</i></button>
                                                <form id="delete-form-{{ $tag->id }}" action="{{ route('admin.tag.destroy', $tag->id) }}" method="POST" style="display:none;">
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
    function deleteTag(id){
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

