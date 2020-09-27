@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2">
            <section class="card">
                <header class="card-header">
                    <strong>Update Category</strong>
                    <a href="{{ route('manage-category') }}" class="btn btn-primary pull-right">Manage Category</a>
                </header>
                <div class="card-body">
                    <form method="post" action="{{ route('update-category') }}">
                        @csrf
                        <div class="form-group">
                            <label for="brandname">Category Name</label>
                            <input type="text" class="form-control" id="brandname" placeholder="Enter Brand name" value="{{ $category->category_name }}" name="category_name">
                            <input type="hidden" value="{{ $category->id }}" name="id">
                        </div>
                        
                        <button type="submit" class="btn btn-primary pull-right" name="update-category">Submit</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection