<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Papi BAN</title>

        <link rel="stylesheet" href="{{asset('bootstrap-4.5.0\dist\css\bootstrap.css')}}">
        <style>
        body{
            font-family: "Nunito", "Segoe UI", arial;
        }
        #head{
            color:#557cf3;
        }
        </style>
    </head>
    <body>
    
    <div class="container" style="margin-top:2em;">
        <div class="row">
            <div class="col-12">
                <h2 id="head">Papi Tambal Ban ( Pencarian Tambal Ban Terdekat )</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <img src="{{url('img\teropong.png')}}" alt="" srcset="" class="img img-responsive" width="100%">
            </div>
            <div class="col-4" style="padding-top:10em;">
                <h4>Salam Warga Malang,</h4>
                <h6><p>Aplikasi untuk mencari tempat tambal ban, sesuai lokasi terdekat, atau pun sesuai dengan keinginan anda</p></h6>
                <br>
                <a style="width:60%;border-radius:15px;" class="btn btn-primary" href="{{url('/login')}}">LOGIN</a>
            </div>
        </div>
    </div>


    <script src="{{asset('js\jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap-4.5.0\dist\js\bootstrap.js')}}"></script>
    </body>
</html>
