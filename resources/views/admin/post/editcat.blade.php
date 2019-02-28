@extends('layouts.backend.app')
@section('title', 'edit Category')
@push('css')
    
@endpush
@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Category
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.category.update', $categoris->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="tag_name">Category Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                <input type="text" id="tag_name" class="form-control" name="name" value="{{ $categoris->name }}">
                                </div>
                            </div>
                            <label for="tag_image">Image</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="tag_image" class="form-control" name="image">
                                </div>
                    
                        <a href="{{route('admin.category.index')}}" class="btn btn-danger m-t-15 waves-effect">Back</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- #END# Vertical Layout -->
    </div>
@endsection
@push('js')
    
@endpush
