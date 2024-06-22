@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-md-8">
            <ul class="list-unstyled d-flex gap-2 mt-3">
                <li>
                  <a href="/dashboard/posts" class="btn btn-success text-decoration-none">
                    <i class="bi bi-arrow-left-circle"></i> Back to posts</a>
                </li>
                <li>
                  <a href="" class="btn btn-warning text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                    <i class="bi bi-pencil"></i>
                  </a>
                </li>
                <li>
                  <a href="" class="btn btn-danger text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Delete">
                    <i class="bi bi-trash"></i>
                  </a>
                </li>
              </ul>
            <article class="my-3">
                <h2>{{ $post['title'] }}</h2>
                <p>By: <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in 
                    <a href="/blog?category={{ $post->category->slug }}" 
                        class="text-decoration-none">{{ $post->category->name }}
                    </a>
                </p>
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
                <article class="my-3">
                    {!! $post->body !!}
                </article>
        
            </article>
        </div>
    </div>
</div>

  @endsection