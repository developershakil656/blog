@extends('layouts.fontend')

@section('content')
      <!-- Page Content -->
  <div class="container">

<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">

    <h1 class="my-4">Single Post </h1>

    <!-- Blog Post -->
    <div class="card mb-4 p-2">
    <h2 class="card-title mb-4">{{strtoupper($post->title)}}</h2>
    <div class="card-footer text-muted mb-2">
        Posted on January 1, 2017 by
        <a href="#">{{$post->category->category_name}}</a>
      </div>
      <img class="card-img-top" src="{{url($post->img)}}" alt="Card image cap" style="max-height:300px ; max-width:750px ;">
      <div class="card-body">
        <p class="card-text">{{$post->content}}</p>
      </div>
      
    </div>

  </div>
  @include('wigets.sidebar')
@endsection