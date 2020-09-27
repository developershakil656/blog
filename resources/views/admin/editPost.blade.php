@extends('layouts.admin')

@section('content')
<div>
    <section class="card">
        <header class="card-header">
            Add a new Post
        </header>
        <div class="card-body">
            <form method="POST" action="{{route('update-post')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="postTitle">Post Title</label>
                    <input type="text" class="form-control" id="postTitle" placeholder="Title" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="postImg">Select a new Image</label>
                    <input type="file" class="form-control" id="postImg" name="img">

                    <input type="hidden" value="{{$post->img}}" name="old_img">
                    <input type="hidden" value="{{$post->id}}" name="id">
                    
                </div>
                <div >
                    <label for="postImg">Old Image:</label>
                    <img class="m-4" src="{{URL::to($post->img)}}" alt="" style="max-width:200px; max-height:170px;">
                </div>
                <div class="form-group form-check">
                    <label for="cat">Select Category: </label>
                    <select name="cat_id" id="cat">
                        @foreach($category as $row)
                        <option value="{{$row->id}}" {{ $row->id == $post->cat_id?'selected':'' }}>{{$row->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="postImg">Post Content</label>
                    <textarea class="form-control" rows="10" name="content">{{$post->content}}</textarea>
                </div>
                <input type="submit" value="Update Post" class="btn btn-primary" name="update_post">
            </form>
        </div>
    </section>
</div>
@endsection