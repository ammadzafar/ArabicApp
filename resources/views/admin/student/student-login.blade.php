<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Login</title>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!--CSS -->
    <!--  <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">-->
   @include('layouts.css')
</head>
<body>
<div class="wrapper">
    <header class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </header>
    <!-- header ends -->
    <div class="page-content d-table m-auto h-100">
        <section class="section_login">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="at_form_holder">
                            <form action="{{route('user_login')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="3">
                                <div class="at_fromhead">
                                    <h2>SIGN IN TO YOUR ACCOUNT</h2>
                                    <p>(For Student)</p>
                                </div>

                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="text" class="form-control" name="logIn_id" value="{{old('id')}}" placeholder="Enter ID">
                                </div>
                                <div class="at-btnholder">
                                    <button type="submit" class="at-btn">Sign in</button>
                                </div>
                                <p class="at_signup_para">Don’t have an account? <a href="signup-student.html">Sign up here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@include('layouts.js')
</body>
</html>
