@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 style="color:red;font-weight:bolder">CRUD</h1>
        <div class="col-md-8">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('post.index')}}">Post</a>
      </li>

    </ul>
  </div>
</nav>
          <h1 style="color:rgb(61, 58, 222);font-weight:bold;text-align:center;margin-top:70px;">WELCOME TO OUR CRUD APPLICATION</h1>
    </div>
</div>
@endsection
