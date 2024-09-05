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
        <a class="nav-link" href="{{route('post.index')}}">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('post.create')}}">Create</a>
      </li>
    </ul>
  </div>
</nav>
<form method="post" action="{{route('post.update',$post)}}" enctype="multipart/form-data">
    @method('PATCH')
  @csrf
  <!-- @csrf -It is used to validate token and helps to protect form attackers
   and submit the form -->
  <div class="row">

  <div class="col-md-6">
    <label for="status">Category</label>
      <select class="form-control"  name="category_id">
        <option value="" >Select Category</option>
        @foreach($categories as $item){
            <option value="{{$item->id}}"{{old('status')}} {{$item->id==$post->category_id?'selected':''}} >{{$item->name}}</option>
        }
        @endforeach
</select><br>
    </div>


    <div class="col-md-6">
        <label for="name">Title</label>
      <input type="text" name="title" class="form-control" placeholder="Title Name" value={{$post->title}}>
      @error('title')
      <div class="text-danger">{{$message}}</div>
      <!-- OR
              <div class="alert alert-danger">{{$message}}</div>
        -->
      @enderror
    </div><br>

    <div class="col-md-6">
        <label for="name">Content</label>
      <textarea  name="content" class="form-control" placeholder="Content">{{$post->content}}</textarea>
      @error('content')
      <div class="text-danger">{{$message}}</div>
      <!-- OR
              <div class="alert alert-danger">{{$message}}</div>
        -->
      @enderror
    </div><br>




    <div class="col-md-6">
        <label for="name">Image</label>
      <input type="file" name="image" class="form-control" placeholder="Category Name">
      @error('image')
      <div class="text-danger">{{$message}}</div>
      <!-- OR
              <div class="alert alert-danger">{{$message}}</div>
        -->
      @enderror
    </div><br>


    <div class="col-md-6">
    <label for="status">Status</label>
      <select class="form-control"  name="status">
        <option value="draft" >Published</option>
        <option value="draft">Draft</option>
</select><br>

    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
</div>
@endsection