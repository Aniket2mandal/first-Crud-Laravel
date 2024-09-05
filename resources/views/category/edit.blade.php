@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 style="color:red;font-weight:bolder">Edit Category Here</h1>
        <div class="col-md-8">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('category.index')}}">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('category.edit','$categories->id')}}">Edit</a>
      </li>
    </ul>
  </div>
</nav>
<form method="post" action="{{route('category.update',$categories->id)}}">
  @csrf
  <!-- @csrf -It is used to validate token and helps to protect form attackers
   and submit the form -->
  @method('PUT')
  <div class="row">
    <div class="col">
        <label for="name">Name</label>
      <input type="text" name="name" class="form-control" value="{{$categories->name}}"placeholder="Category Name">
      @error('name')
      <div class="text-danger">{{$message}}</div>
      <!-- OR
              <div class="alert alert-danger">{{$message}}</div>
        -->
      @enderror
    </div>
    <div class="col">
    <label for="status">Status</label>
      <select class="form-control" name="status">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
</select>

    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
    </div>
</div>
@endsection
