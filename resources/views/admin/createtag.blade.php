@extends('layouts.backend.app')
@section('title', 'Create tag')
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
                            Create Tag Name
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.tag.store') }}" method="POST">
                            @csrf
                            <label for="email_address">Tag Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tag_name" class="form-control" name="name" placeholder="Enter Tag Name">
                                </div>
                            </div>
                    
                        <a href="{{route('admin.tag.index')}}" class="btn btn-danger m-t-15 waves-effect">Back</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
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
