@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
    <main class="form-registration w-100 m-auto">
  <form action="/register" method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
    <div class="form-floating">
      <input type="text" class="form-control rounded-top @error('name')
          is-invalid
      @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}"required>
      <label for="name">Name</label>
      @error('name')
      <div id="validationServer03Feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="text" class="form-control @error('username')
          is-invalid
      @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
      <label for="username">Username</label>
      @error('username')
      <div id="validationServer03Feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="email" class="form-control @error('email')
          is-invalid
      @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
      <label for="email">Email address</label>
      @error('email')
      <div id="validationServer03Feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control rounded-bottom @error('password')
          is-invalid
      @enderror" id="password" name="password" placeholder="Password" required>
      <label for="password">Password</label>
      @error('password')
      <div id="validationServer03Feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
  </form>
  <p class="mt-5 mb-3 text-body-secondary text-center">&copy; 2024</p>
  <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
</main>
    
    </div>
</div>
@endsection