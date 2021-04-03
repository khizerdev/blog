@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Tags</h5>

          @if(session()->has('message'))
          <div class="alert alert-success">
              <p>{{session('message')}}</p>
          </div>
          @endif
          
          <table class="table">
            <thead class="bg-primary">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tag Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @if(count($tags) > 0)
            @foreach ($tags as $tag)    
                <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->tag}}</td>
                <td>
                    <a href={{route('admin.tag.edit' , $tag->id) }} class="btn btn-info">Edit</a>

                    <a href={{route('admin.tag.destroy', $tag->id)}} class="btn btn-danger">Delete</a>

                </td>
                </tr>
            @endforeach
            @else
                <td>No Tags Found..</td>
            @endif
            </tbody>
          </table>
        </div>
      </div>

@endsection
