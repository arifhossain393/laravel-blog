@extends('layouts.backend.app')
@section('title', 'Show Post')
@push('css')
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout -->
       
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ $post->title }}
                            <small>Posted By <strong><a href="">{{ $post->user->name }}</a></strong> to {{ $post->created_at->toFormattedDateString() }}</small>
                            </h2>
                        </div>
                        <div class="body">
                           {!! $post->body !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                Category
                            </h2>
                        </div>
                        <div class="body">
                            @foreach ($post->categories as $category)
                                <span class="label bg-cyan">{{ $category->name }}</span>
                            @endforeach
                        </div>
                        
                    </div>

                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Tag
                            </h2>
                        </div>
                        <div class="body">
                            @foreach ($post->tags as $tag)
                                <span class="label bg-red">{{ $tag->name }}</span>
                            @endforeach 
                        </div>
                        
                    </div>

                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                Image
                            </h2>
                        </div>
                        <div class="body">
                            <img class="show-small" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt=""> 
                        </div>
                        
                    </div>
                </div>
            </div>
                <!-- #END# Vertical Layout -->
       
    </div>
@endsection
@push('js')
    
@endpush
