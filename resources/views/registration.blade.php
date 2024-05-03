@extends('layout')
@section('title', 'Registration')
@section('content')
  <div class="container">

    <div class="mt-5">
      @if($errors->any())

      <div class="col-12">
        @foreach($errors->all() as $error)
          <div class = "alert alert-danger"> {{$error}} </div> 
        @endforeach

      </div>
      @endif

      @if(session()->has('error'))
      <div class = "alert alert-danger"> {{session('error')}} </div> 

      @endif

    </div>

      <form action= "{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-5" style="width : 500px">
      @csrf    
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label class="form-label">UserName</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="cpassword">
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
      </form>
  </div>
@endsection