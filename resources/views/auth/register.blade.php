<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arabic Learning | Register</title>
    @include('layouts.css')
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!--************************************
        Wrapper Start
*************************************-->
<div id="at-wrapper" class="at-wrapper at-signinpagewrapper">
    <!--************************************
            SginIn Page Start
    *************************************-->
    <div class="at-signinpage at-signuppage">
        <form class="at-formtheme" method="POST" action="{{route('register_new_user')}}" enctype="multipart/form-data">
            @csrf
            <div class="at-signinpagecontentarea">
                <div class="at-fileform">

                    <fieldset>
                        <div class="form-group">
                            <div class="at-inputwidthicon">
                                <input type="file" name="image" id="at-uploadimg">
                                <label for="at-uploadimg">
                                    <i class="icon-add"></i>
                                    <span>Upload Image</span>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="at-signincontentholder">
                <div class="at-signinpagecontent">
                    <strong class="at-logo">
							<span>
								<img src="{{asset('assets/images/logo-Active Quran.png')}}" alt="logo">
							</span>
                    </strong>
                    <div class="at-signintitle">
                        <h2>Register</h2>
                        <!-- <span>only for students</span> -->
                    </div>
                    <div class="at-signinform">
                        <fieldset>
                            <div class="form-group">
                                <label>Nationality</label>
                                <select name="country" id="country" class="at-selecttheme at-selectcountery" required="">
                                    <option value="">Select a country</option>
                                    <optgroup id="country-optgroup-Asia" label="-select-">
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Myanmar [Burma]">Myanmar [Burma]</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Thailand">Thailand</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="at-inputwidthicon">
                                    <i class="icon-user-age"></i>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="at-inputwidthicon">
                                    <i class="icon-email"></i>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@email.com">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="at-inputwidthicon">
                                    <i class="icon-lock"></i>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="******">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="at-inputwidthicon">
                                    <i class="icon-lock"></i>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="******">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="at-btn at-btnlogin">Register</button>
                            </div>
                            <div class="at-dontaccount">
                                <span>I have an account? <a href="{{url('/login')}}">Login here</a></span>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--************************************
            SignIn Page End
    *************************************-->
</div>
<!--************************************
        Wrapper End
*************************************-->
@include('layouts.js')
</body>
</html>














{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
