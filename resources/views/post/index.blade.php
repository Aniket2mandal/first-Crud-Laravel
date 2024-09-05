@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(session('sucess'))
<div class='text-sucess'>{{session('sucess')}}</div>
@endif
        <h1 style="color:red;font-weight:bolder">Post</h1>

        <div class="col-md-8">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('post.index')}}">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('post.create')}}">Create</a>
      </li>
    </ul>
  </div>
</nav>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Author</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
        $i=1;
    @endphp
@foreach ($post as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->title}}</td>
      <td>{{$item->content}}</td>
      <td>{{$item->user->name}}</td>
      <td>{{$item->status}}</td>
      <td>
        @if ($item->image)
        <img src="{{asset('images/'.$item->image)}}" style="width: 100px;height:100px">
        @else
        <img src="#">
        @endif

    </td>
      <td>
        <a href="{{route('post.edit',$item)}}" class="btn btn-primary">Edit</a>
        <form id="dltbtn" action="{{route('post.destroy',$item)}}" method="post">
         @method('DELETE')
         @csrf
        <button type="submit" class="btn  btn-danger delete_button">Delete</button>
        <form>
      </td>
    </tr>

  </tbody>
  @endforeach
</table>
    </div>
</div>
{{-- JQUERY --}}
<script>
    $(document).ready(function(){
  $("#dltbtn").submit(function(){
   confirm("Do you really wanted to delete data ?");
  });
});
    </script>
@endsection
