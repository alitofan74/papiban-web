<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Papi BAN</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('admin-templ/assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admin-templ/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-templ/assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('admin-templ/assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{url('img\logo.ico')}}" />
    <style>
        body {
            font-family: "Nunito", "Segoe UI", arial;
        }

        #head {
            color: #557cf3;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error" style="padding:0;">
                    <div class="page-inner">
                        <h2 class="font-weight-bold" id="head">Papi Tambal Ban ( Pencarian Tambal Ban Terdekat )</h2>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <img src="{{url('img\teropong.png')}}" width="90%" class="user-img mr-2" alt="">
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 6%;">
                                <h4 class="font-weight-bold">Salam Warga Malang,</h4>
                                <p class="my-1 page-description" style="line-height:normal;">Aplikasi untuk mencari tempat tambal ban, sesuai lokasi terdekat, atau pun sesuai dengan keinginan anda</p>

                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20%;">
                            <div class="col-sm-6 col-md-6 col-lg-6"></div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <a style="border-radius:15px;width:100%; margin-right:0" class="btn btn-primary btn-block btn-lg" href="{{url('/login')}}">LOGIN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="{{asset('admin-templ/assets/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{asset('admin-templ/assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('admin-templ/assets/js/custom.js')}}"></script>
</body>

</html>