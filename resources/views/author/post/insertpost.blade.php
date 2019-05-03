@extends('layouts.backend.app')
@section('title', 'Create Author Post')
@push('css')
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <form action="{{ route('author.post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Create Post Name
                            </h2>
                        </div>
                        <div class="body">
                           
                            <label for="post_title">Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="post_title" class="form-control" name="title" placeholder="Enter Post Title">
                                </div>
                            </div>
                            <label for="post_image">Image</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="post_image" class="form-control" name="image">
                                </div>
                            </div>
                            <input type="checkbox" id="post_status" class="filled-in" name="status">
                            <label for="post_status">Published</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Select category & Tag
                            </h2>
                        </div>
                        <div class="body {{ $errors->has('categories') ? 'focused error' : '' }}">
                           
                            <label for="post_cat">Category</label>
                            <select class="form-control show-tick" name="categories[]" id="post_cat" data-live-search="true" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="post_tag">Tag</label>
                            <select class="form-control show-tick" name="tags[]" id="post_tag" data-live-search="true" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                    
                    
                        <a href="{{route('author.post.index')}}" class="btn btn-danger m-t-15 waves-effect">Back</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Body
                            </h2>
                        </div>
                        <div class="body">
                            <textarea id="tinymce" name="body"></textarea>
                            
                        </div>
                    </div>
                </div>
            </div>
                <!-- #END# Vertical Layout -->
        </form>    
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset("assets/backend/plugins/tinymce") }}';
        });
    </script>
@endpush
