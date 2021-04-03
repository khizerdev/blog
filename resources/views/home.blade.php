@extends('layouts.front')

@section('content')
<div class="bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending-news-area-2">
                    <span class="title">TRENDING NEWS - </span>
                    <div class="trending-slider owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-1716px, 0px, 0px); transition: all 0s ease 0s; width: 5148px;">
                        @foreach ($all_post as $key => $post)     
                        <div class="owl-item {{$key == 0 ? 'active' : '' }}" style="width: 843px; margin-right: 15px;">
                            <div class="item">
                            {{$post->title}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="video-area-3 bg-blue pd-top-70 pd-bottom-70 mt-5">
    <div class="container">
        <div class="section-title section-title-2">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <h5 class="title">Latest Post</h5>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-12">
                <div class="top-post-wrap top-post-wrap-2">
                    <div class="thumb">
                        <div class="overlay"></div>
                        <img src="{{ $first_post->featured}}" class="w-100" alt="img">
                    </div>
              
                    <div class="top-post-details">
                        <h5><a href="{{route('single-post' , $first_post->slug)}}">{{ $first_post->title}}</a></h5>
                        <div class="meta d-flex">
                            <a href="{{route('single-post' , $first_post->id)}}" class="author">
                                {{ $first_post->created_at->diffForHumans() }} <span>|</span> 
                            </a>
                            <div class="date mr-0">
                                {{$first_post->user->name}} <span>|</span> 
                            </div>
                            <div class="Length">
                                Category : {{ $first_post->category->name }}
                            </div>
                        </div>
                        @foreach ($first_post->tags as $t)
                            <a class="tag tag-yellow" href="{{route('by-tag' , $t->id)}}">{{$t->tag}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top-news-area-2 pd-top-70 pd-bottom-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="title mb-0">Recent Posts</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($second_post as $post)    
                        <div class="media-post-wrap-2 media shadow-none">
                            <div class="thumb">
                                <img src="{{$post->featured}}" width="270" height="170" alt="img">
                                <a class="tag tag-yellow mt-3" href="">{{$post->category->name}}</a>
                            </div>
                            <div class="media-body">
                                <h6><a href="{{route('single-post' , $post->slug)}}">{{$post->title}}</a></h6>
                                <div class="meta">
                                    <a href="#" class="author">
                                        {{$post->user->name}} <span>|</span> 
                                    </a>
                                    <div class="date">
                                        {{$post->created_at->toFormattedDateString()}} <span>|</span> 
                                    </div>
                                    <div class="comment">
                                        <i class="fa fa-comments-o"></i>
                                        0
                                        <span>|</span>
                                    </div>
                                </div>
                                <p>{{ Str::limit($post->content, 100) }} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-area">
                    <div class="widget widget-category">
                        <h5 class="widget-title">Categories</h5>
                        @foreach ($allcategories as $category)    
                            <a href="{{route('by-category' , $category->id)}}" class="single-widget-category">
                                {{$category->name}}
                                <span>{{ $category->posts->count() }}</span>
                            </a>
                        @endforeach
                    </div>
                    <div class="widget widget_tags widget-category">
                        <h4 class="widget-title">Tags</h4>
                        <div class="tagcloud">
                            @foreach ($tags as $tag)
                            <a href="{{route('by-tag' , $tag->id)}}">{{$tag->tag}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- blog area Start -->
<div class="blog-area pd-top-60 pd-bottom-60">
    <div class="container">
        <div class="section-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="title">{{$electronics->name}}</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-slider owl-carousel owl-theme">
                
                    @foreach ($electronics->posts as $post)    
                    <div class="item">
                        <div class="single-blog-inner">
                            <div class="thumb">
                                <img src="{{$post->featured}}" alt="img">
                            </div>
                            <div class="single-blog-inner-details">
                                <h5><a href="{{route('single-post' , $post->slug)}}">{{$post->title}}</a></h5>
                                <p>{{$post->content}}</p>
                                <div class="meta">
                                    <div class="date">
                                        {{$post->created_at->toFormattedDateString()}} <span>|</span> 
                                    </div>
                                    <a href="#" class="author">
                                        {{$post->user->name}}
                                    </a> 
                                </div>
                                <div class="Length float-lg-right">
                                </div>
                                <div class="tag-area">
                                    <?php $counter = 1; ?>
                                    @foreach ($post->tags as $tag)
                                    <a class="tag  @if($counter % 2 == 0) {{'tag-blue'}} @endif" href="{{route('by-tag' , $tag->id)}}">{{$tag->tag}} </a>
                                    <?php $counter++; ?>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog area end -->


{{-- mail-chimp --}}

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="widget widget-subscribe">
                <h5>Subscribe Now</h5>
                <div class="widget-subscribe-details text-center">
                    <div class="thumb">
                        <img src="{{asset('images/envelope.png')}}" alt="img">
                    </div>
                    <h6>Subscribe Our Newslatter</h6>
                    <div class="newsletter-inner">
                        <input type="text" placeholder="Enter Your Email address">
                        <button><i class="fa fa-paper-plane-o"></i></button>
                    </div>
                    <p>There is only notifications about new products & updates</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
