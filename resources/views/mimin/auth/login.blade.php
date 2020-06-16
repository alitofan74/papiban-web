@extends('mimin.auth.layout')
@section('body')
<div class="row">
  <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="card card-primary">
      <div class="card-header">
        <h4>Login</h4>
      </div>
      <div class="card-body">
        <form id="formLogin" method="POST" action="" onsubmit="return false">
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
            <div class="invalid-feedback">
              Please fill in your email
            </div>
          </div>
          <div class="form-group">
            <div class="d-block">
              <label for="password" class="control-label">Password</label>
              <!-- <div class="float-right">
                <a href="auth-forgot-password.html" class="text-small">
                  Forgot Password?
                </a>
              </div> -->
            </div>
            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
            <div class="invalid-feedback">
              please fill in your password
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="mt-5 text-muted text-center">
      Don't have an account? <a href="{{url('/register')}}">Create One</a>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $('#formLogin').on('submit', function() {
    console.log(values);
    var values = $("#formLogin").serializeArray();
    console.log(values);
    var email = values[0].value;
    var password = values[1].value;

    firebase.auth().signInWithEmailAndPassword(email, password).then(function(user) {
      console.log(user.user.email);
      setCookie("userLogin", user.user.email, 1);
      window.location = window.location.origin + "/mimin";
    }, function(error) {
      var errorCode = error.code;
      var errorMessage = error.message;
      if (error) {
        iziToast.error({
          title: 'Error!',
          message: errorMessage,
          position: 'topRight'
        });
        return;
      }
      console.log(error);
    });
    return false;
  });

  console.log(firebase.auth().currentUser)
</script>
@endsection