@extends('layouts.fontend')

@section('content')
<div class="main_content">
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Home Page</h1>

        <!-- Blog Post -->
        @foreach($post as $row)
        <div class="card mb-4">
          <img class="card-img-top" src="{{url($row->img)}}" alt="Card image cap" style="max-height:300px ; max-width:750px ;">
          <div class="card-body">
            <h2 class="card-title">{{strtoupper($row->title)}}</h2>
            <p class="card-text">{{substr($row->content,0,250)}}</p>
            <a href="{{route('single-post',$row->id)}}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="{{route('single-category',$row->category->id)}}">{{$row->category->category_name}}</a>
          </div>
        </div>
        @endforeach

        {{$post->links()}}
        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>
      @include('wigets.sidebar')
    </div>

    @endsection