@extends('master')

@section('title', '| Edit Tag')

@section('content')
    <form method="POST" action="/tags/{{ $tag->id }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $tag->name }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection