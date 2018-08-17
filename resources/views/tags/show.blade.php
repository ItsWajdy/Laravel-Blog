@extends('master')

@section('title', "| $tag->name Tag")

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} <small>{{ $tag->posts()->count() }} Posts</small></h1>
        </div>
        <div class="col-md-4">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right" style="margin-top:30px">Edit</a>
        </div>
        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="col-md-2">
                <input type="submit" class="btn btn-danger pull-right" name="delete" value="Delete"/>
            </div>
        </form>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tag->posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @foreach($post->tags as $tag)
                                        <span class="label label-default">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection