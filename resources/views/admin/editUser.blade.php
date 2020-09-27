@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2">
            <section class="card">
                <header class="card-header">
                    <strong>Edit This User</strong>
                    <a href="{{ url('user/create') }}" class="btn btn-primary pull-right">Add User</a>
                </header>
                <div class="card-body">
                    <form method="post" action="{{ url('user',$user->id)}}" enctype="multipart/form-data" id="signupForm">
                        @csrf
                        @method('put')
                        <input type="hidden" name="old_image" value="{{$user->image}}">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="img">User Image</label>
                            <input type="file" class="form-control" id="img" name="image" accept="image/*" onchange="preview_image(event)">

                            <img id="output_image" src="{{!empty($user->image)?url($user->image):'#'}}"/>
                        </div>
                        <div class="form-group">
                            <label for="user">User Name</label>
                            <input type="text" class="form-control" value="{{$user->name}}" id="user" placeholder="Enter User name" value="{{ old('name') }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="gmail">User Gmail</label>
                            <input type="email" class="form-control" id="gmail" value="{{$user->email}}" placeholder="Enter User Gmail" value="{{ old('email') }}" name="email">
                        </div>
                        <div class="form-group">
                            <label for="number">User Number</label>
                            <input type="number" class="form-control" id="number" value="{{$user->number}}" placeholder="Enter User Number" value="{{ $user->number||old('number') }}" name="number">
                        </div>

                        <p>- This is Optional -</p>
                        <hr>
                        <div class="form-group">
                            <label for="password">User New Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter User Password" value="{{ old('password') }}" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" placeholder="Enter User Password" value="{{ old('confirm_password') }}" name="confirm_password">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="role">User Role: </label>
                            <select name="user_role" id="role">
                                <option value="user" {{$user->user_role=='user'?'selected':''}}>User</option>
                                <option value="admin" {{$user->user_role=='admin'?'selected':''}}>Admin</option>
                                <option value="admin" {{$user->user_role=='visitor'?'selected':''}}>visitor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select name="status" id="status">
                                <option value="1" {{$user->status==1?'selected':''}}>Active</option>
                                <option value="0" {{$user->status==0?'selected':''}}>Inactive</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary pull-right" >Submit</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var Script = function () {
$().ready(function() {

    // validate signup form on keyup and submit
    $("#signupForm").validate({
        rules: {
            name: "required",
            email: "required",
            number: {
                minlength: 11
            },
            password: {
                minlength: 8
            },
            confirm_password: {
                minlength: 8,
                equalTo: "#password"
            },
            
        },
        messages: {
            name: "Please enter User Name",
            email: "Please enter User Gmail",
            number: {
                required: "Please enter a number",
                minlength: "Your number must consist of at least 11 number"
            },
            password: {
                minlength: "Your password must be at least 8 characters long"
            },
            confirm_password: {
                minlength: "Your password must be at least 8 characters long",
                equalTo: "Please enter the same password as above"
            },
            
        }
    });

});


}();
</script>
@endsection