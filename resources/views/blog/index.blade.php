@extends('master')

@section('title', '| Blog')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{ $post->title }}</h2>
                <h5>Published: {{ $post->created_at->diffForHumans() }}</h5>
                
                {{-- strip_tags(str) Strips str From All HTML Tags --}}
                {{-- Used To Display Output From The WYSIWYG Editor --}}    
                <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? "..." : "" }}</p>

                <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                <hr>
            </div>
        </div>
    @endforeach
    
    <div class="row">
        <div class="col-md-12">
            <div class="text-cente">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection