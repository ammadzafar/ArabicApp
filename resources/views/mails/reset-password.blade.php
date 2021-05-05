@extends('layouts.app')
@section('content')
    <main id="at-main" class="at-main at-haslayout">
        <div class="container">
            <div class="at-login">
                <div class="at-boxlayout at-login-arae">
                    <form class="at-formtheme at-formstylechange" method="post" action="{{route('password.email')}}">
                        @csrf
                        <fieldset>
                            <div class="at-formbox">
                                <div class="at-headingbox">
                                    <h2>Forget Password</h2>
                                </div>
                                <div class="form-group">
                                    <div class="at-inputicon"><i class="icon-user"></i></div>
                                    <label class="at-inputbox">
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                        <span class="at-placeholderlabel">Email</span>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <blod>{{ $errors->first('email') }}</blod>
                                            </span>
                                        @endif
                                    </label>
                                </div>

                                <div class="form-group">
                                    <button class="at-btn at-roundbtn"><i class="icon-arrow-right"></i>submit</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
