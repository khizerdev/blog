@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update {{$tag->tag}}</h5>

          @include('admin.includes.error')

          <form action="{{route('admin.tag.update' , $tag->id)}}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" value={{{$tag->tag}}} name="tag" class="form-control">
            </div>
            
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Update Tag
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>

@endsection
