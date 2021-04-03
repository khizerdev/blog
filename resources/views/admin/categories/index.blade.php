@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Categories</h5>

          @if(session()->has('message'))
          <div class="alert alert-success">
              <p>{{session('message')}}</p>
          </div>
          @endif
          
          <table class="table">
            <thead class="bg-primary">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @if(count($categories) > 0)
            @foreach ($categories as $category)    
                <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>

                    <a href={{route('admin.category.edit' , $category->id) }} class="btn btn-info">Edit</a>

                    <a href={{route('admin.category.destroy', $category->id)}} class="btn btn-danger">Delete</a>

                </td>
                </tr>
            @endforeach
            @endif
            </tbody>
          </table>
        </div>
      </div>

@endsection
