@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-1">
            <section class="card">
                <header class="card-header">
                    <strong>Manage All Category</strong>
                    <a href="{{ route('add-category') }}" class="btn btn-primary pull-right">Add Category</a>
                </header>
                <div class="card-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($no=1)
                                @foreach($post as $row)
                                <tr class="gradeX">
                                    <td>{{ $no }}</td>
                                    <td>{{$row->category->category_name}}</td>
                                    <td><img src="{{ url($row->img) }}" alt="" style="max-width:150px; max-height:130px"></td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->content }}</td>
                                    <td class="text-right">
                                        <a href="{{route('edit-post',$row->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('delete-post',$row->id)}}" class="btn btn-xs btn-danger" id="delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @php($no++)
                                @endforeach
                                {{$post->links()}}
                            <tbody>
                        </table>
                        {{$post->links()}}
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
