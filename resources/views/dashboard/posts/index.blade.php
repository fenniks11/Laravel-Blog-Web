@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>
  <div class="table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Title</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)    
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-primary text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Detail">
                <i class="bi bi-eye"></i></a>
            <a href="" class="btn btn-warning text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit"> 
                <i class="bi bi-pencil"></i></a>
            <a href="" class="btn btn-danger text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Delete">
                <i class="bi bi-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection