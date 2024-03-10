@extends('layout')
@section('title', 'Registration')
@section('content')
<div class="container">
        <div class="mt-5">
            @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif 
        </div>
    <form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 600px">
        @csrf
  <div class="form-title">
    REGISTER
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Enter a valid email address.</div>
  </div>
  <div class="mb-3">
    <label for="expassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="expassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="checkbox" name="terms">
    <label class="form-check-label" for="checkbox">Agree to <a href="#"> Terms </a> and <a href="#"> Conditions</a></label>
  </div>
  <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_CAPTCHA_KEY')}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
@endsection