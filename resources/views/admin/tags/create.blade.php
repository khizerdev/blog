@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create a new Tag</h5>

          @include('admin.includes.error')

          @if(session()->has('message'))
          <div class="alert alert-success">
              <p>{{session('message')}}</p>
          </div>
          @endif

          <form action="{{route('admin.tag.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="tag">Tag Name</label>
                <input type="text" name="tag" class="form-control">
            </div>
            
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Create Tag
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>

@endsection
