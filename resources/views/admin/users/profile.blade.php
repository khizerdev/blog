@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Your Profile</h5>

          @include('admin.includes.error')

          @if(session()->has('message'))
          <div class="alert alert-success">
              <p>{{session('message')}}</p>
          </div>
          @endif

          <form action="{{route('admin.user.profile.update' , $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="avatar">Upload Profile Picture</label>
                <input type="file" name="avatar" class="form-control">

            </div>

            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" value="{{$user->profile->facebook}}" name="facebook" class="form-control">
            </div>

            <div class="form-group">
                <label for="youtube">Youtube</label>
                <input type="text" value="{{$user->profile->youtube}}" name="youtube" class="form-control">
            </div>

            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" cols="30" rows="10" class="form-control">{{$user->profile->about}}</textarea>
            </div>
            
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Update Profile
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>

@endsection
