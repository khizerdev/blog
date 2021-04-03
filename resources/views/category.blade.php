@extends('layouts.front')

@section('content')

<div class="blog-category-area bg-gray pd-top-70 pd-bottom-80">
    <div class="container">
        <div class="section-title">
            <div class="row">
                <div class="col-sm-6">
                    <?php $name = 0 ?>
                    @foreach ($category_post as $category_name)    
                    @if ($name == 1)
                        @break
                    @endif
                    <h5 class="title">
                        {{ $category_name->category->name}}
                    </h5>
                    <?php $name++ ?>
                    @endforeach
                </div>
                <div class="col-sm-6 text-sm-right align-self-center">
                    <h5><a href="#">{{$category_post->count()}}</a></h5>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($category_post as $post)    
            <div class="col-lg-4 col-md-6">
                <div class="single-post-wrap">
                    <div class="thumb">
                        <img src="{{$post->featured}}" alt="img">
                      
                        @foreach ($post->tags as $t)
                            <a class="tag" href="#">{{$t->tag}}</a>
                        @endforeach
                    </div>
                    <h6><a href="{{route('single-post' , $post->slug)}}">{{$post->title}}</a></h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
