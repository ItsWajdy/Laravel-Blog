@extends('master')

@section('title', '| Create Post')

@section('head_content')
    {{-- Tag Selector Scripts --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    {{-- WYSIWYG Editor Scripts --}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({ 
            selector: "textarea", 
            plugins: "code textcolor colorpicker link",
            menubar: false
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>

            <form method="POST" action="/posts">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tag</label>
                    <select name="tags[]" id="tags" class="js-example-basic-multiple form-control" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" name="body" class="form-control"></textarea>
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection