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
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no=1)
                                @foreach($category as $row)
                                <tr class="gradeX">
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->category_name }}</td>
                                    <td><input type="checkbox" data-id="{{ $row->id }}" id="categoryStatus" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $row->status==1?'checked':'' }}></td>
                                    <td class="text-right">
                                        <a href="{{route('edit-category',$row->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                                @php($no++)
                                @endforeach
                                {{$category->links()}}
                            <tbody>
                        </table>
                        {{$category->links()}}
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
