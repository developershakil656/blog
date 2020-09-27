@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2">
            <section class="card">
                <header class="card-header">
                    <strong>Add a New Category</strong>
                    <a href="{{ route('manage-category') }}" class="btn btn-primary pull-right">Manage Category</a>
                </header>
                <div class="card-body">
                    <form method="post" action="{{ route('save-category') }}">
                        @csrf
                        <div class="form-group">
                            <label for="brandname">Category Name</label>
                            <input type="text" class="form-control" id="brandname" placeholder="Enter Brand name" value="{{ old('category_name') }}" name="category_name">
                        </div>
                        
                        <button type="submit" class="btn btn-primary pull-right" name="save-category">Submit</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection