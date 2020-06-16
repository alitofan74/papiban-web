<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Papi Ban</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin-templ/assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-templ/assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-templ/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin-templ/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin-templ/assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('admin-templ/assets/css/custom.css')}}">
  <link rel="stylesheet" href="{{asset('admin-templ/assets/bundles/izitoast/css/iziToast.min.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{url('img\logo.ico')}}" />
  @yield('css')
</head>

<body onload="checkCookie()">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{asset('admin-templ/assets/img/user.png')}}" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <strong id="userLoginEmail"></div>
              <div class="dropdown-divider"></div>
              <a href="{{url('/login')}}" onclick="deleteCookie()" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{url('img\logo-sidebar.png')}}" class="header-logo" style="width:60% ; height:auto;" /></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="@yield('beranda')">
              <a href="{{url('/mimin')}}" class="nav-link"><i data-feather="monitor"></i><span>Beranda</span></a>
            </li>
            <li class="@yield('tambalban')">
              <a href="{{url('/mimin/tambal+ban')}}" class="nav-link"><i data-feather="circle"></i><span>Tambal Ban</span></a>
            </li>
            <li class="@yield('komentar')">
              <a href="{{url('/mimin/komentar')}}" class="nav-link"><i data-feather="list"></i><span>Komentar</span></a>
            </li>
            <li class="@yield('rating')">
              <a href="{{url('/mimin/rating')}}" class="nav-link"><i data-feather="star"></i><span>Rating</span></a>
            </li>
            <li class="@yield('member')">
              <a href="{{url('/mimin/member')}}" class="nav-link"><i data-feather="users"></i><span>Member</span></a>
            </li>
            <!-- <li class="@yield('pesan')">
              <a href="{{url('/mimin/pesan')}}" class="nav-link"><i data-feather="inbox"></i><span>Pesan</span></a>
            </li> -->

          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            @yield('body')
          </div>
        </section>
        @yield('modal')
        <!-- <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="{{url('/')}}">Papi Ban</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('admin-templ/assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('admin-templ/assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('admin-templ/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin-templ/assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('admin-templ/assets/js/page/datatables.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('admin-templ/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('admin-templ/assets/js/custom.js')}}"></script>
  <script src="{{asset('admin-templ/assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
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
          $('body').find('#userLoginEmail').html(c.substring(name.length, c.length));
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
      // if (user != "") {
      //   window.location = window.location.origin + "/mimin";
      // } else 
      if (user == "") {
        console.log();
        window.location = window.location.origin + "/login";
      }
    }
  </script>
  @yield('script')
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>