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
        <form class="" id="formRegister" method="POST" action="" onsubmit="return false">
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
            <button type="submit" class="btn btn-primary btn-lg btn-block" id="submitFormRegister">
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
@section('script')
<script>
  // Add Data
  $('#formRegister').on('submit', function() {
    console.log(values);
    var values = $("#formRegister").serializeArray();
    console.log(values);
    var fullname = values[0].value;
    var username = values[1].value;
    var email = values[2].value;
    var password = values[3].value;
    var password2 = values[4].value;
    // If Not same return False.     
    if (password != password2) {
      iziToast.error({
        title: 'Error!',
        message: 'Password not match',
        position: 'topRight'
      });
      return;
    }

    if (email.length < 4) {
      iziToast.error({
        title: 'Error!',
        message: 'Please enter an email address.',
        position: 'topRight'
      });
      return;
    }
    if (password.length < 6) {
      iziToast.error({
        title: 'Error!',
        message: 'Please enter a password, min length 6.',
        position: 'topRight'
      });
      return;
    }
    console.log(values);
    ref = firebase.database().ref('users');
    console.log(ref)
    key = ref.push().getKey();
    console.log(key)
    handleSignUp(key, fullname, username, password, email);
    return false;
  });

  /**
   * Handles the sign up button press.
   */
  function handleSignUp(key, fullname, username, password, email) {
    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user) {
      console.log(user);
      var user = firebase.auth().currentUser;
      console.log(user);
      createUsers(key, fullname, username, password, email);
    }, function(error) {
      var errorCode = error.code;
      var errorMessage = error.message;
      if (errorCode == 'auth/weak-password') {
        iziToast.error({
          title: 'Error!',
          message: 'The password is too weak.',
          position: 'topRight'
        });
        return;
      } else {
        iziToast.error({
          title: 'Error!',
          message: errorMessage,
          position: 'topRight'
        });
        return;
      }
      console.log(error);
    });
  }

  function createUsers(key, fullname, username, password, email) {
       firebase.database().ref('users/' + key).set({
      full_name: fullname,
      user_name: username,
      password: password,
      email: email,
      foto: "http://shyntadarmawan.000webhostapp.com/assets/user.png",
      created_time: Date.now()
    })
    $("#formRegister input").val("");
    $("#formRegister")[0].reset();
    iziToast.success({
      title: 'Success!',
      message: 'Successfully register',
      position: 'topRight'
    });
  }
</script>
@endsection