@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Posts</h5>

          @if(session()->has('message'))
          <div class="alert alert-success">
              <p>{{session('message')}}</p>
          </div>
          @endif
          
          <table class="table">
            <thead class="bg-primary">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
            @if(count($posts) > 0)
            @foreach ($posts as $post)    
                <tr>
                <th scope="row">{{$no}}</th>
                <td><img src="{{$post->featured}}" class="img-fluid" style="width:50px;height:50px" alt=""></td>
                <td>{{$post->title}}</td>
                <td>{{$post->category->name}}</td>
                @if(!Auth::user()->admin)
                <td>
                  @if($post->status)
                    Active
                  @endif
                  @if(!$post->status)
                    Pending
                  @endif
                </td>
                @endif
                @if(Auth::user()->admin)
                <td>

                  @if($post->status)
                  <a href={{route('admin.post.disable' , $post->id) }} class="btn btn-warning btn-sm">Click here to Disable</a>
                @endif
                @if(!$post->status)
                 <a href={{route('admin.post.approve' , $post->id) }} class="btn btn-info btn-sm">Click here to Approve</a>
                @endif
                </td>
                @endif
                <td>
                    @if(!Auth::user()->admin)
                    <a href={{route('admin.post.edit' , $post->id) }} class="btn btn-info">Edit</a>
                    @endif

                    <a href={{route('admin.post.destroy', $post->id)}} class="btn btn-danger">Delete</a>

                </td>
                </tr>
                <?php $no++ ?>
            @endforeach
            @endif
            </tbody>
          </table>
        </div>
      </div>

@endsection
