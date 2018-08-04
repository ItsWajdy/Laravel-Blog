@extends('master')

@section('title', '| Posts')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('createPost') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td> 
                                {{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}
                                {{-- @if (strlen($post->body) > 50)
                                    {{ substr($post->body, 0, 50).'...' }}
                                @else
                                    {{ $post->body }}
                                @endif --}}
                            </td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td><a href="/posts/{{ $post->id }}" class="btn btn-default">View</a> <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                <?php echo $posts->links(); ?>
            </div>
        </div>
    </div>
@endsection