@extends('master')

@section('title', '| Edit Comment')

@section('head_content')
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
            <h1>Edit Comment</h1>
            <form action="/comments/{{$comment->id}}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" disabled value="{{ $comment->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" disabled value="{{ $comment->email }}">
                </div>

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" id="comment" rows="3" class="form-control">{{ $comment->comment }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" class="form-control">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection