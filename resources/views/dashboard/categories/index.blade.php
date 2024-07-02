@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Posts Categories</h1>
  </div>
  {{-- Alert berhasil --}}
  @if (session()->has('success'))    
  <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="table-responsive col-lg-6">
    <a href="/dashboard/categories/create" class="btn btn-primary my-3">Create New Category</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)    
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td class="d-flex justify gap-2">
            <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-primary text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="left" title="See more of {{ $category->name }}">
                <i class="bi bi-eye"></i>
            </a>
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit {{ $category->name }}">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="/dashboard/posts/{{ $category->slug }}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger text-decoration-none"
                onclick="return confirm('Are you sure?')"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Delete">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </td>
        
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection