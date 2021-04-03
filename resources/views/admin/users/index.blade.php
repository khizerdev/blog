@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Users</h5>

          @if(session()->has('message'))
          <div class="alert alert-success">
              <p>{{session('message')}}</p>
          </div>
          @endif
          
          <table class="table">
            <thead class="bg-primary">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Permission</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @if(count($users) > 0)
            @foreach ($users as $user)    
                <tr>
                <th scope="row">{{$user->id}}</th>
                <th scope="row"><img src="@if($user->profile->avatar) {{asset($user->profile->avatar)}} @else {{"https://pbs.twimg.com/profile_images/573692360263004161/gOvizBEP_400x400.jpeg"}} @endif" width=50 height=50 style="border-radius: 50px" class="img-fluid" alt=""></th>
                <td>{{$user->name}}</td>
                <td>
                  @if($user->admin)
                    @if(Auth::id() !== $user->id)
                    <a type="button" href="{{route('admin.user.not-admin' , $user->id)}}" class="btn btn-danger">Remove Permissions</a>
                    @else
                    <p>Your Profile</a>
                    @endif
                  @else
                  <a type="button" href="{{route('admin.user.make-admin' , $user->id)}}" class="btn btn-success">Make Admin</a>
                  @endif
                </td>
                <td>
                    @if(Auth::id() !== $user->id)
                    <a href={{route('admin.user.destroy', $user->id)}} class="btn btn-danger">Delete</a>
                    @endif
                </td>
                </tr>
            @endforeach
            @endif
            </tbody>
          </table>
        </div>
      </div>

@endsection
