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
                <style>
                    #image {
                      width: 100%;
                      height: 20%;
                    }
                  </style>
                @if ($post->image)    
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" 
                alt="{{ $post->category->name }}"
                style="width: 100%; height: 350px; overflow: hidden; object-fit: cover;">
                @else
                <img src=""  src="" alt="Dynamic Image" class="img-fluid categories-image" data-category="{{ $post->category->name }}" width="100%">
                @endif
                <article class="my-3 fs-4">
                    {!! $post->body !!}
                </article>
        
                <a href="/blog" class="text-decoration-none mt-3" >Back to posts</a>
            </article>
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
        </div>
    </div>
</div>
    
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const apiKey = 'Y3JalIMzpnhLu53I1qDKHby3PBCAtQeSczOmkkWu8DoImjtyeh2Zn6aU';
        // const category = ''; // Assuming you pass category name from PHP
        const perPage = 1; // Number of images to fetch

        // Construct the Pexels API endpoint
        const endpoint = `https://api.pexels.com/v1/search?query=${encodeURIComponent('{{ $post->category->slug }}')}&per_page=${perPage}`;

        fetch(endpoint, {
            headers: {
                Authorization: apiKey
            }
        })
        .then(response => response.json())
        .then(data => {
            const imageUrl = data.photos[0].src.large; // Adjust size as needed
            const imageElement = document.getElementById('image');
            imageElement.src = imageUrl;
        })
        .catch(error => {
            console.error('Error fetching image:', error);
        });
    });
</script>
