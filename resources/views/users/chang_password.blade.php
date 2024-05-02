@extends('layouts.password')
@section('title', 'home')
@section('breadcrumb', 'HOME  -Change Password')
@section('content')


 <div class="col-lg-6">
            <div class="form-group">
<!-- Account settings -->
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Change Password  </h6>
    </div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
    <div class="card-body">
       <form method="POST" action="{{ route('change.password') }}" id="edit_profile_form" name="edit_profile_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
      <div class="form-group">
             <label for="quantity">Old Password:</label>
              <input type="Password" required="" class="form-control" id="oldpassword" name="current_password"/>
           </div>
          <div class="form-group">
               <label for="quantity">New Password:</label>
              <input type="Password" required="" class="form-control" id="newpassword" name="password">
              @error('password')
              <div class="alert alert-danger">

                  <strong>{{ 'Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.' }}</strong>

            </div>
          @enderror
          </div>
                    <div class="form-group">
             <label for="quantity">Confirm Password:</label>
              <input type="Password" required="" class="form-control" id="cpassword" name="password_confirmation">
          </div>




<br>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
 </div>
</div>
<!-- /account settings -->


@endsection
