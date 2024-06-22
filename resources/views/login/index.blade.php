@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
      {{-- Alert berhasil register --}}
      @if (session()->has('success'))    
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      {{-- Alert Login Gagal --}}
      @if (session()->has('loginError'))    
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('loginError') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <main class="form-signin w-100 m-auto">
            <form action="/login" method="POST">
              @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="">
                    <div class="form-floating">
                        <input type="text" name ="username" id="username" placeholder="Username" class="form-control @error('name')
                            is-invalid
                        @enderror" value="{{ old('name') }}"required autofocus>
                        <label for="username">Username</label>
                      </div>
                      <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password')
                            is-invalid
                        @enderror" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                      </div>
                      <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                </form>
              <p class="mt-5 mb-3 text-body-secondary text-center">&copy; 2024</p>
              <small class="d-block text-center mt-3" >No registered? <a href="/register">Register Now!</a></small>
            </form>
          </main>
    </div>
</div>
@endsection