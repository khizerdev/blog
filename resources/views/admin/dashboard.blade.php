@extends('layouts.app')

@section('content')

<div class="container-flu">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    Total Posts
                    <div class="text-white">{{$post_count}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Total Categories
                    <div class="text-white">{{$cat_count}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Total Tags
                    <div class="text-white">{{$tag_count}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-dark text-white shadow">
                <div class="card-body">
                    Total Users
                    <div class="text-white">{{$user_count}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection