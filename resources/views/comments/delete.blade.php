@extends('master')

@section('title', '| Delete Comment')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS COMMENT</h1>
            <p>
                <strong>Name</strong> {{ $comment->name }} <br>
                <strong>Email</strong> {{ $comment->email }} <br>
                {{ $comment->comment }}
            </p>

            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-block">Yes, Delete Comment</button>
            </form>
        </div>
    </div>
@endsection