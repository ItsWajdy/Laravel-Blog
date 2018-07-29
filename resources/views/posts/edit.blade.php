@extends('master')

@section('title', '| Edit Post')

@section('content')
<div class="row">
    <form action="/posts/{{ $post->id }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ $post->title }}">
            </div>
            
            <div class="form-group">
                <label for="body">Body</label>
                <textarea rows="7" name="body" name="body" class="form-control" required>{{ $post->body }}</textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ $post->created_at->diffForHumans() }}</dd>

                    <dt>Last Updated:</dt>
                    <dd>{{ $post->updated_at->diffForHumans() }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-success btn-block" name="save" value="Save"/>
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-danger btn-block" name="cancel" value="Cancel"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection