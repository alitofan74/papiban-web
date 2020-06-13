<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Papi Tambal Ban</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin-templ/assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-templ/assets/bundles/izitoast/css/iziToast.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-templ/assets/bundles/jquery-selectric/selectric.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin-templ/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin-templ/assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('admin-templ/assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{url('img\logo.ico')}}" />
  <style>
    body {
      background-color: #E5E9F4;
    }
  </style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <img src="{{url('img\0003.jpg')}}" alt="" srcset="" class="img img-responsive" width="30%" style="z-index: -1; position:absolute; margin-top:-5%; margin-left:60%">
      <div class="container mt-5">
        @yield('body')
      </div>
    </section>

  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('admin-templ/assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('admin-templ/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('admin-templ/assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{asset('admin-templ/assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('admin-templ/assets/js/page/auth-register.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('admin-templ/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('admin-templ/assets/js/custom.js')}}"></script>
  <script>
    setTimeout(function() {
      $('#alertregis').fadeOut('slow');
    }, 3000);

    function checkPassword(form) {
      password1 = form.password.value;
      password2 = form.passwordconfirm.value;

      // If Not same return False.     
      if (password1 != password2) {
        iziToast.error({
          title: 'Error!',
          message: 'Password not match',
          position: 'topRight'
        });
        return false;
      }
    }
  </script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->

</html>