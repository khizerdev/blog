@extends('layouts.front')

@section('content')

<div class="blog-details-area pd-top-50 pd-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-wrap">
                    <p class="category"><i class="fa fa-home"></i>  Home / {{ $post->category->name}} / {{ $post->title}}</p>
                    <h4>{{$post->title}}</h4>
                    
                    <div>
                        <?php $counter = 1; ?>
                        @foreach ($post->tags as $tag)
                        <a class="tag @if($counter % 2 == 0) {{'tag-1'}} @endif" href="{{route('by-tag' , $tag->id)}}">{{$tag->tag}}</a>
                        <?php $counter++; ?>
                        @endforeach
                    </div>
                    <div class="meta">
                        <a href="#" class="author">
                            <img src="{{$post->user->profile->avatar}}" height="40" alt="img">
                            {{-- {{dd($post->user)}} --}}
                            By {{$post->user->name}}
                        </a>
                    </div>
                    <div class="meta float-sm-right">
                        <div class="date">
                            <i class="fa fa-clock-o"></i>
                            {{$post->created_at->diffForHumans()}}
                        </div>
                        {{-- <div class="comments m-0">
                            <i class="fa fa-comments"></i>
                            Comments 254
                        </div> --}}
                        <div class="time">
                            <i class="fa fa-clock-o"></i>
                            5 mins Read
                        </div>
                    </div>
                    <div class="blog-details-slider mb-0 owl-carousel owl-theme">
                        <div class="item">
                            <div class="top-post-wrap">
                                <div class="thumb">
                                    <img src="{{$post->featured}}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>{!!$post->content!!}</p>
                    
                    <div class="blog-share-area">
                        <h5 class="mt-0">Share Post</h5>
                        <ul class="social-area social-area-3">
                            <li>
                                <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li>
                               <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                               <a class="behance" href="#"><i class="fa fa-behance"></i></a>
                            </li>
                            <li>
                               <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="category-area pd-bottom-40">
                        <div class="section-title">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="title">Find By Categories</h5>
                                </div>
                            </div>
                        </div>
                        <div class="category-finding-inner">
                            @foreach ($categories as $key => $category)
                            <a href="{{route('by-category' , $category->id)}}" class="{{$key % 2 == 0 ? 'travel' : '' }}">{{$category->name}}<span>{{$category->posts->count()}}</span></a>
                            @endforeach
                        </div>
                    </div>
                   
                   
                    <div class="comment-area">
                        <h5>You May Add Comment Now.</h5>
                        

                        @include('includes.disqus')

                    </div>
                </div>                    
            </div>
            <div class="col-lg-4">
                <div class="sidebar-area mt-5 mt-lg-0">
                    <div class="widget widget-subscribe">
                        <h5>Subscribe Now</h5>
                        <div class="widget-subscribe-details text-center">
                            <div class="thumb">
                                <img src="assets/img/icon/envelope.png" alt="img">
                            </div>
                            <h6>Subscribe Our Newslatter</h6>
                            <div class="newsletter-inner">
                                <input type="text" placeholder="Enter Your Email address">
                                <button><i class="fa fa-paper-plane-o"></i></button>
                            </div>
                            <p>There is only notifications about new products &amp; updates</p>
                        </div>
                    </div>
                    <div class="widget widget-social-area">
                        <h5 class="widget-title">Social Media</h5>
                        <ul>
                            <li class="facebook"><a href="{{$post->user->profile->facebook}}"><i class="fa fa-facebook-square"></i>Facebook 12k</a></li>
                            <li class="youtube"><a href="{{$post->user->profile->youtube}}"><i class="fa fa-youtube-play"></i>Youtube 34k</a></li>
                        </ul>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- post-banner end -->

@endsection
