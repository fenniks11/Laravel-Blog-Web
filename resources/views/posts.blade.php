@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog" method="GET">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                <button class="btn btn-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const apiKey = 'Y3JalIMzpnhLu53I1qDKHby3PBCAtQeSczOmkkWu8DoImjtyeh2Zn6aU';
            const perPage = 1; // Number of images to fetch
            const endpoint = `https://api.pexels.com/v1/search?query={{ urlencode($posts[0]->category->slug) }}&per_page=${perPage}`;

            fetch(endpoint, {
                headers: {
                    Authorization: apiKey
                }
            })
            .then(response => response.json())
            .then(data => {
                const imageUrl = data.photos[0].src.large; // Adjust size as needed
                const imageElement = document.getElementById('first-image');
                imageElement.src = imageUrl;
            })
            .catch(error => {
                console.error('Error fetching image:', error);
            });
        });
    </script>

    <div class="card mb-3">
        @if ($posts[0]->image)    
        <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid" 
        alt="{{ $posts[0]->category->name }}"
        style="width: 100%; height: 350px; overflow: hidden; object-fit: cover;">
        @else
        <img class="card-img-top" id="first-image" src="" alt="Dynamic Image" width="1200" height="400">
        @endif
        <div class="card-body text-center">
            <h5 class="card-title">{{ $posts[0]->title }}</h5>
            <small class="text-muted">
                <p>By: <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in 
                    <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> Last updated {{ $posts[0]->created_at->diffForHumans() }}
                </p>
            </small>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more..</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="position-absolute px-3 py-2 " style="background-color: rgba(0,0,0,0.7)">
                            <a href="/blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                        </div>
                        @if ($post->image)    
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" 
                        alt="{{ $post->category->name }}"
                        style="width: 100%; height: 350px; overflow: hidden; object-fit: cover;">
                        @else
                        <img class="card-img-top categories-image" alt="{{ $post->category->name }}" width="1200" height="400" data-category="{{ $post->category->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>
                            <small class="text-muted">
                                <p>By: <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> Last updated {{ $post->created_at->diffForHumans() }}</p>
                            </small>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const apiKey = 'Y3JalIMzpnhLu53I1qDKHby3PBCAtQeSczOmkkWu8DoImjtyeh2Zn6aU';
            const images = document.querySelectorAll('.categories-image');

            images.forEach((image) => {
                const category = image.getAttribute('data-category');
                const perPage = 1;
                const endpoint = `https://api.pexels.com/v1/search?query=${encodeURIComponent(category)}&per_page=${perPage}`;

                fetch(endpoint, {
                    headers: {
                        Authorization: apiKey
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const imageUrl = data.photos[0].src.large;
                    image.src = imageUrl;
                })
                .catch(error => {
                    console.error('Error fetching image:', error);
                });
            });
        });
    </script>

@else
    <p class="text-center fs-4">No post found.</p>
@endif

<div class="d-flex justify-content-center mb-5">
    {{ $posts->links() }}
</div>

@endsection
