<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arabic Learning | Login</title>
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
    <div class="at-signinpage">
        <div class="at-signinpagecontentarea">
            <div class="at-fileform at-signinpagecontentvtwo">
                <div class="at-signinuser">
                    <ul id="RememberUserDiv">

                    </ul>
                </div>
                <div class="at-description">
                    <p>
                        เชิญร่วมทำบุญญาริยะห์ บริจาคเสียงอ่านภาษาอาหรับ
                        เพื่อเป็นความรู้สอน Ai โปรแกรมอัตโนมัติ
                        ยินดีรับจากทุกท่าน (ผู้ชำนาญ บุคคลทั่วไป นักเรียน)
                        ซึ่งความแตกต่างจะเป็นความรู้ที่มีค่ามาก
                        ขออัลเลาะห์ตอบแทนความดีแก่ผู้ที่เกี่ยวข้องทุกท่านเทอญ
                    </p>
                </div>
            </div>
        </div>
        <div class="at-signincontentholder">
            <div class="at-signinpagecontent">
                <strong class="at-logo">
						<span>
							<img src="{{asset('assets/images/logo-Active Quran.png')}}" alt="logo image">
						</span>
                </strong>
                <div class="at-signintitle">
                    <h2>Login to your account</h2>
                    <!-- <span> <a href="adminsignin.html">For Admin</a> </span> -->
                </div>
                <div class="at-signinform">
                    <form method="POST" action="{{ route('login') }}" class="at-formtheme" id="loginForm">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <label>Username</label>
                                <div class="at-inputwidthicon">
                                    <i class="icon-email"></i>
                                    <input type="emai" id="name" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@email.com">
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
                                    <input id="password" type="password" id="id" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="........">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('password.request')}}" class="at-btnforgotpassword">Forgot Password?</a>
                                <div class="at-checkbox">
                                    <input type="checkbox" name="remember" id="at-checkbox1">
                                    <label for="at-checkbox1">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <ul class="at-loginmethoud">
                                    <li>
                                        <a href="mastersignin.html" class="at-btn at-btnloginmethoud">Master Login</a>
                                    </li>
                                    <li>
                                        <a href="studentsignin.html" class="at-btn at-btnloginmethoud">Student Login</a>
                                    </li>
                                    <li>
                                        <a href="ratersignin.html" class="at-btn at-btnloginmethoud">Rater Login</a>
                                    </li>
                                </ul> -->
                                <button type="submit"  class="at-btn at-btnlogin">Login</button>
                            </div>
                            <span class="at-otheraccountlogin">
                                or continue with
                            </span>
                            @php($url = get_parameters())
{{--                            {{dd($url,env('APP_ENV'))}}--}}
                            <div class="form-group">
                                <a href="https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id={{$url[0]}}&redirect_uri={{$url[1]}}&state={{$url[2]}}&scope=profile%20openid%20email&nonce=09876xyz" class="at-btn at-btn-lg at-btnloginwithline"><img src="{{asset('assets/images/line.png')}}" alt="">Login with line</a>
                            </div>
                            <div class="at-dontaccount">
                                <span>Don’t have an account? <a href="{{route('register_user')}}">Register here</a></span>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--************************************
            SignIn Page End
    *************************************-->
</div>
<!--************************************
        Wrapper End
*************************************-->
<!--************************************
        Modal Start
*************************************-->
<div class="modal fade at-loginpagemodal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="at-userdatelmodal">
                    <figure class="at-usermodalimg">
                        <img src="" alt="user image" id="modalImage">
                    </figure>
                    <span id="modalName"></span>
                </div>
                <form class="at-signinform at-formtheme" method="POST" action="{{ route('login') }}">
                   @csrf
                    <fieldset>
                        <div class="form-group" style="display: none">
                            <label>Username</label>
                            <div class="at-inputwidthicon">
                                <i class="icon-email"></i>
                                <input type="emai" id="modalEmail" class="form-control @error('email') is-invalid @enderror" name="email">
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
                                <input id="password" type="password" id="id" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="........">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{route('password.request')}}" class="at-btnforgotpassword">Forgot Password?</a>
                            <div class="at-checkbox">
                                <input type="checkbox" name="remember" id="at-checkbox12">
                                <label for="at-checkbox12">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <ul class="at-loginmethoud">
                                <li>
                                    <a href="mastersignin.html" class="at-btn at-btnloginmethoud">Master Login</a>
                                </li>
                                <li>
                                    <a href="studentsignin.html" class="at-btn at-btnloginmethoud">Student Login</a>
                                </li>
                                <li>
                                    <a href="ratersignin.html" class="at-btn at-btnloginmethoud">Rater Login</a>
                                </li>
                            </ul> -->
                            <button type="submit"  class="at-btn at-btnlogin">Login</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!--************************************
        Modal End
*************************************-->
@include('layouts.js')
<script>
    $(document).ready(function () {
        $("#loginForm").on("submit", function(){
            if ($('input[name=remember]').prop("checked") === true){
                sessionStorage.setItem("remember", "checked");
            }
        });

        // localStorage.clear()
        // sessionStorage.clear();

        for (var i = 0; i < localStorage.length; i++) {

            // set iteration key name
            var key = localStorage.key(i);

            // use key name to retrieve the corresponding value
            var value = localStorage.getItem(key);
            let user = JSON.parse(value);

            let li = '<li>\n' +
                '                            <a href="javascript: void(0);" class="at-signinuserimg logInModal" data-key="'+i+'">\n' +
                '                                <em><img src="'+user.avatar+'" alt="user image"></em>\n' +
                '                                <span>'+user.name+'</span>\n' +
                '                            </a>\n' +
                '                        </li>';

            $('#RememberUserDiv').append(li);

        }

        $(document).on("click",".logInModal", function(){
            let userKey = $(this).data('key');

            let key = localStorage.key(userKey);

            let value = localStorage.getItem(key);

            let user = JSON.parse(value);

            $("#modalImage").attr("src",user.avatar);
            $("#modalName").text(user.name);
            $("#modalEmail").val(user.email);
            $("#exampleModalCenter").modal('show');
        });

    });
</script>
</body>
</html>

