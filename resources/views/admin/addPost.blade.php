@extends('layouts.admin')

@section('content')
<div>
    <section class="card">
        <header class="card-header">
            Add a new Post
        </header>
        <div class="card-body">
            <form method="POST" action="{{route('save-post')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="postTitle">Post Title</label>
                    <input type="text" class="form-control" id="postTitle" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <label for="postImg">Select Image</label>
                    <input type="file" class="form-control" id="postImg" name="img" accept="image/*" onchange="preview_image(event)">

                    <img id="output_image"/>
                </div>
                <div class="form-group form-check">
                    <label for="cat">Select Category: </label>
                    <select name="cat_id" id="cat">
                        @foreach($category as $row)
                        <option value="{{$row->id}}">{{$row->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="postImg">Post Content</label>
                    <textarea class="form-control" rows="10" name="content"></textarea>
                </div>
                <input type="submit" value="Add Post" class="btn btn-primary" name="add_post">
            </form>
        </div>
    </section>
</div>
@endsection