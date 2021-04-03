@extends('layouts.front')

@section('content')

<div class="hot-news-area pd-bottom-40">
    <div class="container">
        <div class="section-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="title">Search Results For : {{$title}}</h5>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @if($posts->isNotEmpty())
            @foreach ($posts as $post)    
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="top-post-wrap">
                    <div class="thumb">
                        <div class="overlay"></div>
                        <img src="{{$post->featured}}" alt="img">
                    </div>
                    <div class="top-post-details">
                        <h6><a href="{{route('single-post' , $post->slug)}}">{{$post->title}}</a></h6>
                        <p>{{$post->created_at->diffForHumans()}} |  {{$post->user->name}}</p>
                        <p class="mb-0">Length: 9 Mins</p>
                        <a class="tag tag-yellow mt-3" href="{{route('by-category' , $post->category_id)}}">{{$post->category->name}}</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else 
            <div class="col-md-6">
                <h2>No posts found</h2>
            </div>
           @endif
        </div>
    </div>
</div>
<!-- visitors-area End -->

@endsection
