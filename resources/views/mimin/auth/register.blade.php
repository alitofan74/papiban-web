@extends('mimin.auth.layout')
@section('body')
@if (session('status'))
<div class="alert alert-success alert-dismissible show fade" id="alertregis">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>&times;</span>
    </button>
    {{ session('status') }}
  </div>
</div>
@endif
<div class="row">
  <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-2">
    <div class="card card-primary">
      <div class="card-header">
        <h4>Signup to Papi Tambal Ban</h4>
      </div>
      <div class="card-body">
        <form method="post" action="{{ action('authController@insert') }}" onSubmit="return checkPassword(this)">
          {{ csrf_field() }}
          <div class="row">
            <div class="form-group col-6">
              <label for="full_name">Full Name <span class="text-danger">*</span></label>
              <input id="full_name" type="text" class="form-control" name="full_name" autofocus required>
            </div>
            <div class="form-group col-6">
              <label for="user_name">User Name <span class="text-danger">*</span></label>
              <input id="user_name" type="text" class="form-control" name="user_name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email Address<span class="text-danger">*</span></label>
            <input id="email" type="email" class="form-control" name="email" required>
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="password" class="d-block">Password<span class="text-danger">*</span></label>
              <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
              <div id="pwindicator" class="pwindicator">
                <div class="bar"></div>
                <div class="label"></div>
              </div>
            </div>
            <div class="form-group col-6">
              <label for="password2" class="d-block">Password Confirmation<span class="text-danger">*</span></label>
              <input id="password2" type="password" class="form-control" name="passwordconfirm" required>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
              <label class="custom-control-label" for="agree" style="font-size: smaller;">Creating an account means you’re okay with our Terms and Service, Privacy Policy, and our default Notificaton Setting</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              Create Account
            </button>
          </div>
        </form>
      </div>
      <div class="mb-4 text-muted text-center">
        Already Registered? <a href="{{url('/login')}}">Login</a>
      </div>
    </div>
  </div>
</div>
@endsection