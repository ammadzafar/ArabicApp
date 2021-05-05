<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arabic Learning | Landingpage</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/apple-touch-icon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome/fontawesome-all.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!--************************************
        Wrapper Start
*************************************-->
<div id="at-wrapper" class="at-wrapper at-nopaddingwrapper">
    <!--************************************
            Header Start
    *************************************-->
    <header id="at-header" class="at-header at-haslayout">
        <div class="at-topbar">
            <strong class="at-logo">
                <a href="javascript:void(0);">
                    <img src="{{asset('assets/images/logo-Active Quran.png')}}" alt="logo image">
                </a>
            </strong>
            <div class="at-nialogoarea">
                <div class="dropdown show at-dropdownlanguage language">
                    <a class="at-btnchangelanguage" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(app()->getLocale() == 'en')
                            <img class="eng-flag" src="{{asset('assets/images/uk.png')}}"  alt="counter flag">
                        @elseif(app()->getLocale() == 'th')
                            <img src="{{asset('assets/images/thailand.png')}}" alt="counter flag">
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item english" href="{{route('change.language',['language'=>'en'])}}">
                            <em>
                                <img src="{{asset('assets/images/uk.png')}}" alt="counter flag">
                            </em>
                            <span>eng</span>
                        </a>
                        <a class="dropdown-item thai" href="{{route('change.language',['language'=>'th'])}}">
                            <em>
                                <img src="{{asset('assets/images/thailand.png')}}" alt="counter flag">
                            </em>
                            <span>thailand</span>
                        </a>
                    </div>
                </div>
                <strong class="at-logovtwo">
                    <a href="javascript:void(0);">
                        <img src="{{asset('assets/images/NIA-Logo.png')}}" alt="logo image">
                    </a>
                </strong>
            </div>
            <div class="at-headerrightarea">
                <div class="at-description heading-paragraph">
                    <p>{{__('thailand.title')}}</p>
                </div>
            </div>
        </div>
    </header>
    <!--************************************
            Header End
    *************************************-->
    <!--************************************
            Main Start
    *************************************-->
    <main id="at-main" class="at-main at-haslayout">
        <div class="at-landingpage">
            <div class="at-landingpagecontent add-language">
                <div class="change-language">
                    <div class="at-description">
                        <p>{{__('thailand.body_text')}}</p>
                    </div>
                    <div class="at-description">
                        <p>{{__('thailand.body_text1')}}</p>
                    </div>
                    <div class="at-description">
                        <p>{{__('thailand.body_text2')}}</p>
                    </div>
                </div>
            </div>
            <div class="at-landingpageimg">
                <figure>
                    <img src="{{asset('assets/images/person.jpg')}}" alt="person image">
                </figure>
            </div>
            <div class="at-btnholdervtwo">
                <a href="{{url('/login')}}" class="at-btn">{{__('thailand.login')}}</a>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
</div>
<!--************************************
        Wrapper End
*************************************-->
<script src="{{asset('assets/js/vendor/jquery-library.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/themefunction.js')}}"></script>
</body>
</html>
