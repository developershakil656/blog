@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-1">
            <section class="card">
                <header class="card-header">
                    <strong>Manage All Category</strong>
                    <a href="{{ url('user/create') }}" class="btn btn-primary pull-right">Add Category</a>
                </header>
                <div class="card-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped table-responsive" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Image</th>
                                    <th>User Name</th>
                                    <th>User Role</th>
                                    <th>Status</th>
                                    <th>Gmail</th>
                                    <th>Number</th>
                                    <th style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($no=1)
                                @foreach($user as $row)
                                <tr class="gradeX">
                                    <td>{{ $no }}</td>
                                    <td><img src="{{ !empty($row->image)?url($row->image):'' }}" alt="" style="max-width:150px; max-height:130px"></td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->user_role}}</td>
                                    <td>{{$row->status==1?'Active':'Inactive'}}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->number }}</td>
                                    <td class="text-right">
                                        <a href="{{url('user',$row->id)}}/edit" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>

                                        <form action="{{url('user',$row->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-danger" id="delete"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php($no++)
                                @endforeach
                                {{$user->links()}}
                            <tbody>
                        </table>
                        {{$user->links()}}
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
