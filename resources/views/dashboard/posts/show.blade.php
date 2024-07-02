@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  {{-- Alert berhasil --}}
  @if (session()->has('success'))    
  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <div class="row my-3">
        <div class="col-md-8">
            <ul class="list-unstyled d-flex gap-2 mt-3">
                <li>
                  <a href="/dashboard/posts" class="btn btn-success text-decoration-none">
                    <i class="bi bi-arrow-left-circle"></i> Back to posts</a>
                </li>
                <li>
                  <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit {{ $post->title }}">
                    <i class="bi bi-pencil"></i>
                </a>
                  </a>
                </li>
                <li>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger text-decoration-none"
                    onclick="return confirm('Are you sure?')"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Delete {{ $post->title }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
                </li>
              </ul>
            <article class="my-3">
                <h2>{{ $post['title'] }}</h2>
                <p>By: <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in 
                    <a href="/blog?category={{ $post->category->slug }}" 
                        class="text-decoration-none">{{ $post->category->name }}
                    </a>
                </p>
                @if ($post->image)    
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" 
                alt="{{ $post->category->name }}"
                style="width: 100%; height: 350px; overflow: hidden; object-fit: cover;">
                @else    
                <img src="" class="img-fluid categories-image" 
                alt="{{ $post->category->name }}" data-category="{{ $post->category->name }}">
                @endif
                <article class="my-3">
                    {!! $post->body !!}
                </article>
        
            </article>
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
    </div>
</div>
<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  @endsection