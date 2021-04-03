@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create a new User</h5>

          @include('admin.includes.error')

          @if(session()->has('message'))
          <div class="alert alert-success">
              <p>{{session('message')}}</p>
          </div>
          @endif

          <form action="{{route('admin.user.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control">
            </div>
            
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Create User
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>

@endsection
