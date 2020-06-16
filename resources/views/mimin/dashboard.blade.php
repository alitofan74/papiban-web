@extends('mimin.layout')
@section('beranda', 'active')
@section('body')
<div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">User</h5>
                                <h2 class="mb-3 font-18" id="userCount">-</h2>
                                <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{asset('admin-templ/assets/img/banner/1.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15"> Tambal Ban</h5>
                                <h2 class="mb-3 font-18" id="tbCount">-</h2>
                                <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{asset('admin-templ/assets/img/banner/2.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Komentar</h5>
                                <h2 class="mb-3 font-18" id="komentarCount">-</h2>
                                <p class="mb-0"><span class="col-green">18%</span>
                                    Increase</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{asset('admin-templ/assets/img/banner/3.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Rating</h5>
                                <h2 class="mb-3 font-18" id="ratingCount">-</h2>
                                <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{asset('admin-templ/assets/img/banner/4.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function getUserCount() {
        firebase.database().ref('users/').on('value', function(snapshot) {
            var value = snapshot.val();
            var cuser = 0;
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    cuser+=1;
                }
            });
            console.log(cuser);
            $('#userCount').html(cuser);
        });
    }
    function getTBCount() {
        firebase.database().ref('tambalban/').on('value', function(snapshot) {
            var value = snapshot.val();
            var ctb = 0;
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    ctb+=1;
                }
            });
            console.log(ctb);
            $('#tbCount').html(ctb);
        });
    }
    function getKomentarCount() {
        firebase.database().ref('komentars/').on('value', function(snapshot) {
            var value = snapshot.val();
            var ckomen = 0;
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    ckomen+=1;
                }
            });
            console.log(ckomen);
            $('#komentarCount').html(ckomen);
        });
    }
    function getRatingCount() {
        firebase.database().ref('ratings/').on('value', function(snapshot) {
            var value = snapshot.val();
            var crating = 0;
            console.log(value)
            $.each(value, function(index, value) {
                if (value) {
                    crating+=1;
                }
            });
            console.log(crating);
            $('#ratingCount').html(crating);
        });
    }

    getUserCount();
    getTBCount();
    getKomentarCount();
    getRatingCount();
</script>
@endsection