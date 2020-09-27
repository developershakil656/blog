@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2">
            <section class="card">
                <header class="card-header">
                    <strong>Add a New User</strong>
                    <a href="{{ url('user') }}" class="btn btn-primary pull-right">Manage User</a>
                </header>
                <div class="card-body">
                    <form method="post" action="{{ url('user') }}" enctype="multipart/form-data" id="signupForm">
                        @csrf
                        <div class="form-group">
                            <label for="img">User Image</label>
                            <input type="file" class="form-control" id="img" name="image" accept="image/*" onchange="preview_image(event)">

                            <img id="output_image"/>
                        </div>
                        <div class="form-group">
                            <label for="user">User Name</label>
                            <input type="text" class="form-control" id="user" placeholder="Enter User name" value="{{ old('name') }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="gmail">User Gmail</label>
                            <input type="email" class="form-control" id="gmail" placeholder="Enter User Gmail" value="{{ old('email') }}" name="email">
                        </div>
                        <div class="form-group">
                            <label for="number">User Number</label>
                            <input type="number" class="form-control" id="number" placeholder="Enter User Number" value="{{ old('number') }}" name="number">
                        </div>
                        <div class="form-group">
                            <label for="password">User Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter User Password" value="{{ old('password') }}" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" placeholder="Enter User Password" value="{{ old('confirm_password') }}" name="confirm_password">
                        </div>
                        <div class="form-group">
                            <label for="role">User Role: </label>
                            <select name="user_role" id="role">
                                <option value="user" selected>User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select name="status" id="status">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
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
                required: true,
                minlength: 11
            },
            password: {
                required: true,
                minlength: 8
            },
            confirm_password: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            },
            user_role: {
                required: true,
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
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long",
                equalTo: "Please enter the same password as above"
            },
            
        }
    });

});


}();
</script>
@endsection