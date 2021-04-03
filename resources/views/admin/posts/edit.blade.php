@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update {{$post->title}}</h5>

          @include('admin.includes.error')

          <form action="{{route('admin.post.update' , $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" id="featured" class="form-control">
                <img src="{{$post->featured}}" id="getFeatured" alt="" class="img-fluid w-50 my-2">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="editor" name="content" cols="5" rows="3" class="form-control">{{$post->content}}</textarea>
            </div>
        
            <div class="form-group">
                <label for="category">Select Category</label>
                <select class="form-control" name="category_id" id="category">
                    @if(count($categories) > 0)
                    @foreach ($categories as $category)                        
                    <option value={{$category->id}} @if($post->category_id === $category->id) {{'selected'}} @else {{''}} @endif>{{ $category->name }}</option>
                    @endforeach
                    @else
                    <option disabled>No Option Found</option>
                    @endif
                </select>
              </div>
              @php
              $ids = $post->tags->count() > 0 ? Arr::pluck($post->tags, 'id') : null
          @endphp 
              <div class="form-group">
                <label>Select Tags</label>
                <select id="multiple" name="tags[]" class="js-states form-control" multiple>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                        @foreach ($post->tags as $t)
                            @if($tag->id === $t->id)
                                    selected
                            @endif
                        @endforeach
                        > 
                        {{$tag->tag}}
                    </option>
                        @endforeach
                </select>
              </div>
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Update Post
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>

@endsection

@section('js')

<script>

$('#featured').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#getFeatured").attr('src', image);
    });
});

$("#multiple").select2({
          placeholder: "Select Tag language",
          allowClear: true
      });
</script>
      <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<script>
CKEDITOR.replace('editor', {
  skin: 'moono',
  enterMode: CKEDITOR.ENTER_BR,
  shiftEnterMode:CKEDITOR.ENTER_P,
  toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
             { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
             { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
             { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
             { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
             { name: 'links', items: [ 'Link', 'Unlink' ] },
             { name: 'insert', items: [ 'Image'] },
             { name: 'spell', items: [ 'jQuerySpellChecker' ] },
             { name: 'table', items: [ 'Table' ] }
             ],
});
</script>

@endsection
