@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update {{$category->name}}</h5>

          @include('admin.includes.error')

          <form action="{{route('admin.category.update' , $category->id)}}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value={{{$category->name}}} name="name" class="form-control">
            </div>
            
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Update Category
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>

@endsection
