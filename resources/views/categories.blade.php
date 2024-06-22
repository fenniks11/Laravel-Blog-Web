@extends('layouts.main')

@section('container')
<h1>Post Category</h1>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4">
            <a href="/blog?category={{ $category->slug }}">
                <div class="card text-bg-dark text-white">
                    <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="img-fluid" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-items-center">
                        <div class="w-100">
                            <h5 class="card-title text-center p-0 fs-3" style="background-color:rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small>Last updated {{ $category->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
