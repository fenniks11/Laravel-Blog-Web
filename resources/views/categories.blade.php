@extends('layouts.main')

@section('container')
<h1>Post Category</h1>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4">
            <a href="/blog?category={{ $category->slug }}">
                <div class="card text-bg-dark text-white">
                    <img src="" class="img-fluid categories-image" alt="{{ $category->name }}" data-category="{{ $category->name }}">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const apiKey = 'Y3JalIMzpnhLu53I1qDKHby3PBCAtQeSczOmkkWu8DoImjtyeh2Zn6aU';
            const images = document.querySelectorAll('.categories-image'); // Select all images with class 'categories-image'
    
            images.forEach((image) => {
                const category = image.getAttribute('data-category'); // Get the category name from the data-category attribute
                const perPage = 1; // Number of images to fetch
                const endpoint = `https://api.pexels.com/v1/search?query=${encodeURIComponent(category)}&per_page=${perPage}`;
    
                fetch(endpoint, {
                    headers: {
                        Authorization: apiKey
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const imageUrl = data.photos[0].src.large; // Adjust size as needed
                    image.src = imageUrl;
                })
                .catch(error => {
                    console.error('Error fetching image:', error);
                });
            });
        });
    </script>
</div>
@endsection

