@extends('master')

@section('title', '| Home')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome To My Blog!</h1>
                <p class="lead">Test website implementing basic functionality of a blog. This is a test website and if you are not a developer, you should not be seeing this!</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            @foreach ($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) ? "..." : "" }}</p>
                    <a href="/blog/{{ $post->slug }}", class="btn btn-primary">Read More</a>
                </div>

                <hr>

            @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>
@endsection