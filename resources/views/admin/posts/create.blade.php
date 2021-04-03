@extends('layouts.app')

@section('content')

    

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create a new post</h5>

          @include('admin.includes.error')

          <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="editor" cols="5" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Select Category</label>
                <select class="form-control" name="category_id" id="category">
                    @if(count($categories) > 0)
                    @foreach ($categories as $category)                        
                    <option value={{$category->id}}>{{ $category->name }}</option>
                    @endforeach
                    @else
                    <option disabled>No Option Found</option>
                    @endif
                </select>
              </div>
            
            <div class="form-group">
                <label>Select Tags</label>
                <select id="multiple" name="tags[]" class="js-states form-control" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->tag}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">
                        Store Post
                    </button>
                </div>
            </div>
        </form>
        </div>
      </div>

@endsection

@section('js')

<script>

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
