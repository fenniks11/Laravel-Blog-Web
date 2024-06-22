@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <article class="mb-3">
                <h2>{{ $post['title'] }}</h2>
                <p>By: <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in 
                    <a href="/blog?category={{ $post->category->slug }}" 
                        class="text-decoration-none">{{ $post->category->name }}
                    </a>
                </p>
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
                <article class="my-3 fs-4">
                    {!! $post->body !!}
                </article>
        
                <a href="/blog" class="text-decoration-none mt-3" >Back to posts</a>
            </article>
        </div>
    </div>
</div>
    
@endsection
