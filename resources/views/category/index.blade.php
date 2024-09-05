@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(session('sucess'))
<div class='text-sucess'>{{session('sucess')}}</div>
@endif
        <h1 style="color:red;font-weight:bolder">Category</h1>

        <div class="col-md-8">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('category.index')}}">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('category.create')}}">Create</a>
      </li>
    </ul>
  </div>
</nav>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Category Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @php
  $i=1;
  @endphp
  @foreach($categories as $item)
    <tr>

      <th scope="row">{{$i++}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->status}}</td>
      <td>
        <a href="{{route('category.edit',$item->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger delete_button">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>
@endsection
