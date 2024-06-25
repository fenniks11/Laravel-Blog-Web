@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>
  <div class="col-lg-8">
    <form method="POST" action="/dashboard/posts">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required disabled readonly>
            </div>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
          </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
          </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + encodeURIComponent(title.value))
        .then(response => response.json())
        .then(data => {
            slug.value = data.slug;
        })
        .catch(error => {
            console.error('Error fetching slug:', error);
        });
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

  </script>
@endsection