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

<body onload="checkCookie()">
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
  <script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-database.js"></script>
  <script>
    // Initialize Firebase
    var config = {
      apiKey: "{{ config('services.firebase.api_key') }}",
      authDomain: "{{ config('services.firebase.auth_domain') }}",
      databaseURL: "{{ config('services.firebase.database_url') }}",
      storageBucket: "{{ config('services.firebase.storage_bucket') }}",
      projectId: "{{ config('services.firebase.project_id') }}",
      messagingSenderId: "{{ config('services.firebase.messagingSenderId') }}",
      appId: "{{ config('services.firebase.appId') }}",
    };
    firebase.initializeApp(config);
    var database = firebase.database();

    setTimeout(function() {
      $('#alertregis').fadeOut('slow');
    }, 3000);

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toGMTString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    function deleteCookie(){
      document.cookie = "userLogin=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }

    function checkCookie() {
      var user = getCookie("userLogin");
      console.log(user);
      if (user != "") {
        window.location = window.location.origin + "/mimin";
      } 
      // else {
      //   console.log();
      //   window.location = window.location.origin + "/login";
      // }
    }
  </script>
  @yield('script')
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->

</html>