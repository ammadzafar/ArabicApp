{{--<header id="at-header" class="at-header at-haslayout">--}}
{{--    <div class="at-navigationarea">--}}
{{--        <!-- <a class="at-btnopensidebar" href="javascript:void(0);">--}}
{{--            <span></span>--}}
{{--        </a> -->--}}
{{--        <div class="at-themehead">--}}
{{--            <h2>{{auth()->user()->name}}</h2>--}}
{{--        </div>--}}
{{--        <div class="at-searchdropdownholder">--}}
{{--        <!-- <div class="at-notifications dropdown">--}}
{{--                <span class="at-onlinedot"></span>--}}
{{--                <a class="at-btnnotification dropdown-toggle" href="javascript:void(0);" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-notification1"></i></a>--}}
{{--                <div class="dropdown-menu at-themedropdownmenu " aria-labelledby="dropdownMenuLink">--}}
{{--                    <ul class="notificationsList">--}}
{{--                        <!-- @if(auth()->user()->unreadNotifications )--}}
{{--        --}}{{--                            @foreach(auth()->user()->unreadNotifications as $key => $notification)--}}
{{--        --}}{{--                                <li>--}}
{{--        --}}{{--                                    <a href="javascript:void(0);">--}}
{{--        --}}{{--                                        <i class="icon-envelpop"></i>--}}
{{--        --}}{{--                                        <p><strong>{{$notification->data['Event']}}</strong>--}}
{{--        --}}{{--                                            <span>{{$notification->created_at->diffForHumans()}}</span></p>--}}
{{--        --}}{{--                                    </a>--}}
{{--        --}}{{--                                </li>--}}
{{--        --}}{{--                            @endforeach--}}
{{--        --}}{{--                        @endif -->--}}
{{--        --}}{{--                        <li>--}}
{{--        --}}{{--                            <a href="javascript:void(0);">--}}
{{--        --}}{{--                                <i class="icon-envelpop"></i>--}}
{{--        --}}{{--                                <p>You have successfully sent <strong>360</strong> emails.<span>Just now</span></p>--}}
{{--        --}}{{--                            </a>--}}
{{--        --}}{{--                        </li>--}}
{{--        --}}{{--                        <li>--}}
{{--        --}}{{--                            <a href="javascript:void(0);">--}}
{{--        --}}{{--                                <i class="icon-envelpop"></i>--}}
{{--        --}}{{--                                <p>You have <strong>640</strong> emails remaining.<span>9 days ago</span></p>--}}
{{--        --}}{{--                            </a>--}}
{{--        --}}{{--                        </li>--}}
{{--        --}}{{--                        <li>--}}
{{--        --}}{{--                            <a href="javascript:void(0);">--}}
{{--        --}}{{--                                <i class="icon-survey1"></i>--}}
{{--        --}}{{--                                <p><strong>Muhammad Usman</strong> has submitted a survey.<span>13 days ago</span></p>--}}
{{--        --}}{{--                            </a>--}}
{{--        --}}{{--                        </li>--}}
{{--        --}}{{--                        <li>--}}
{{--        --}}{{--                            <a href="javascript:void(0);">--}}
{{--        --}}{{--                                <i class="icon-mobile1"></i>--}}
{{--        --}}{{--                                <p>You have <strong>520</strong> SMS remaining.<span>2 W ago</span></p>--}}
{{--        --}}{{--                            </a>--}}
{{--        --}}{{--                        </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div> -->--}}
{{--            <div class="at-usermenu dropdown">--}}
{{--                <a class="dropdown-toggle" href="javascript:void(0);" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    <figure class="at-userimg">--}}
{{--                        <span class="at-onlinedot"></span>--}}
{{--                        <img src="{{asset('assets/images/default.png')}}" alt="User Image">--}}
{{--                    </figure>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu at-themedropdownmenu" aria-labelledby="dropdownMenuLink">--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <span class="at-username">{{auth()->user()->name}}</span>--}}
{{--                            <span class="at-useremail">{{auth()->user()->email}}</span>--}}
{{--                        </li>--}}
{{--                        --}}{{--                      <!--   @if(auth()->user()->isVendor())--}}
{{--                        --}}{{--                        <li>--}}
{{--                        --}}{{--                            <a href="{{route('vendor_profile')}}">View Profile</a>--}}
{{--                        --}}{{--                            <a href="{{route('vendor_subscription_list')}}">Subscriptions</a>--}}
{{--                        --}}{{--                        </li>--}}
{{--                        --}}{{--                        @endif -->--}}
{{--                        <li>--}}
{{--                            <a class="at-btnlogout"  href="{{route('logout')}}" >Sign out</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        --}}{{--        <form class="at-formtheme at-formsearch">--}}
{{--        --}}{{--            <fieldset>--}}
{{--        --}}{{--                <div class="form-group at-inputwithicon">--}}
{{--        --}}{{--                    <i class="icon-search1"></i>--}}
{{--        --}}{{--                    <input type="search" name="search" class="form-control" placeholder="Search any thing here...">--}}
{{--        --}}{{--                </div>--}}
{{--        --}}{{--            </fieldset>--}}
{{--        --}}{{--        </form>--}}
{{--    </div>--}}
{{--    @if(auth()->user()->isAdmin())--}}
{{--        @include('layouts.sidebar')--}}
{{--    @elseif(auth()->user()->isMaster())--}}
{{--        @include('master.master-sidebar')--}}
{{--    @else--}}
{{--        @include('student.student-sidebar')--}}
{{--    @endif--}}
{{--</header>--}}

<header id="at-header" class="at-header at-haslayout">
    <div class="at-topbar">
        <strong class="at-logo">
            @if(auth()->user()->isAdmin())
               <a href="{{route('admin_dashboard')}}">
            @elseif(auth()->user()->isStudent())
               <a href="{{route('student_dashboard')}}">
            @elseif(auth()->user()->isRater())
               <a href="{{route('rater_dashboard')}}">
            @endif
               <img src="{{asset('assets/images/logo-Active Quran.png')}}" alt="logo image">
            </a>
        </strong>
        @if(auth()->user()->isAdmin())
        <a href="javascript:void(0);" class="at-btnmenuvtwo">
            <img src="{{asset('assets/images/text-justify.svg')}}" alt="bar icon">
        </a>
        @endif
        <div class="at-nialogoarea">
            <div class="dropdown show at-dropdownlanguage">
                <a class="at-btnchangelanguage" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(app()->getLocale() == 'en')
                        <img class="eng-flag" src="{{asset('assets/images/uk.png')}}"  alt="counter flag">
                    @elseif(app()->getLocale() == 'th')
                        <img src="{{asset('assets/images/thailand.png')}}" alt="counter flag">
                    @endif
                </a>
                <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
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
            <!-- <a href="{{route('logout')}}" class="at-logout">
                <i class="fas fa-power-off"></i>
                exit
            </a> -->
            <div class="dropdown at-userinfodropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><img src="{{  auth()->user()->line_image_status == 0 ? asset('uploads/profile-pictures/'.auth()->user()->avatar) : auth()->user()->avatar}}" alt="user image"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('user_profile',['id'=>auth()->user()->id])}}">
                        <i class="fas fa-cog"></i>
                        <span class="eng-lang">{{__('thailand.setting')}}</span>
                    </a>
                    <a class="dropdown-item" href="{{route('logout')}}">
                        <i class="fas fa-sign-out-alt"></i>
                        <!-- <i class="fas fa-power-off"></i> -->
                        <span class="eng-lang">{{__('thailand.exit')}}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="at-headerrightarea">
            <div class="at-description">
{{--                <p class="eng-lang">Received funding to develop online learning system National Innovation Agency 2020</p>--}}
                <p class="thai-lang">{{__('thailand.title')}}</p>
            </div>
        </div>
    </div>
    @if(auth()->user()->isAdmin())
            @include('layouts.sidebar')
{{--        @elseif(auth()->user()->isMaster())--}}
{{--            @include('master.master-sidebar')--}}
{{--        @else--}}
{{--            @include('student.student-sidebar')--}}
        @endif
</header>
