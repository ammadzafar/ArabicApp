@extends('layouts.master')
@section('page-title')
    <title>Arabic-Learning | Profile</title>
@endsection
@section('body')
    <div class="at-content at-profile">
        <div class="at-sectiontitle">
            <h2>{{__('thailand.profile')}}</h2>
        </div>
        <div class="at-profileholder">
            <div class="at-profileform at-signinform">
                <form class="at-formtheme" action="{{route('user_profile_update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <div class="at-inputwidthicons">
                                <figure>
                                    <img class="profile-image" src="{{  auth()->user()->line_image_status == 0   ?    asset('uploads/profile-pictures/'.auth()->user()->avatar) : auth()->user()->avatar}}" alt="user image">
                                </figure>
                                <input type="file" name="avatar" value="{{auth()->user()->avatar}}" id="at-selectfile">
                                <label for="at-selectfile">
                                    <i class="icon-edit"></i>
                                </label>
                            </div>
                            <div class="at-usernameemail">
                                <h2>{{auth()->user()->name}}</h2>
                                <span>{{auth()->user()->email}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="at-accountsetting">
                                <i class="icon-user-age"></i>
                                <h3>{{__('thailand.edit_account')}}</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('thailand.nationality')}}</label>
                            <select name="nationality" id="country" class="at-selecttheme at-selectcountery" required="">
                                <option>{{__('thailand.select_country')}}</option>
                                <optgroup id="country-optgroup-Asia" label="-select-">
                                    <option value="Bangladesh" @if ($user->nationality == "Bangladesh") {{ 'selected' }} @endif >Bangladesh</option>
                                    <option value="Brunei" @if ($user->nationality == "Brunei") {{ 'selected' }} @endif >Brunei</option>
                                    <option value="Indonesia" @if ($user->nationality == "Indonesia") {{ 'selected' }} @endif >Indonesia</option>
                                    <option value="Malaysia" @if ($user->nationality == "Malaysia") {{ 'selected' }} @endif >Malaysia</option>
                                    <option value="Myanmar" @if ($user->nationality == "Myanmar") {{ 'selected' }} @endif >Myanmar</option>
                                    <option value="Pakistan" @if ($user->nationality == "Pakistan") {{ 'selected' }} @endif >Pakistan</option>
                                    <option value="Thailand" @if ($user->nationality == "Thailand") {{ 'selected' }} @endif >Thailand</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{__('thailand.name')}}</label>
                            <div class="at-inputwidthicon">
                                <i class="icon-user-age"></i>
                                <input type="text" name="name" value="{{$user->name}}" placeholder="{{__('thailand.enter_name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('thailand.username')}}</label>
                            <div class="at-inputwidthicon">
                                <i class="icon-email"></i>
                                <input type="email" name="email" value="{{$user->email}}" placeholder="example@email.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="at-btn at-btnlogin">{{__('thailand.save')}}</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    @endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('change','#at-selectfile',function(e) {
                let image_src = $('.profile-image').attr('src', URL.createObjectURL(e.target.files[0]));
                // if (image_src != null)
                // {
                //     $('.icon-upload').css({'display':'none'});
                //     $('.org-image').css({'display':'block'});
                // }
            });
        });
    </script>
@endsection
