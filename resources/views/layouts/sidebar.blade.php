<div class="at-sidebarwrapper">
    <a href="javascript:void(0);" class="at-btnmenu">
        <img src="{{asset('assets/images/text-justify.svg')}}" alt="bar icon">
    </a>
    <div class="at-profilearea at-adminprofile">
        <figure class="at-userimage">
            <img src="{{asset('uploads/profile-pictures/'.auth()->user()->avatar)}}" alt="">
        </figure>
        <div class="at-userprofile">
            <h3>{{auth()->user()->name}}</h3>
            <!-- <a href="profile.html">View Profile</a> -->
        </div>
    </div>
    <div class="at-sidebarnavigation">
        <nav class="at-nav">
            <ul>
                <li class="{{(request()->segment(2) == 'dashboard' ? 'at-active': '' )}}">
                    <a href="{{route('admin_dashboard')}}">
                        <i class="icon-dashboard"></i>
                        <span>{{__('thailand.dashboard')}}</span>
                    </a>
                </li>
                <li class="{{(request()->segment(2) == 'chapter' ? 'at-active': '' )}}">
                    <a href="{{route('admin_create_chapter')}}">
                        <i class="icon-chapter"></i>
                        <span>{{__('thailand.chapters')}}</span>
                    </a>
                </li>
                <li  class="{{(request()->segment(1) == 'rule' ? 'at-active': '' )}}">
                    <a href="{{route('admin_index_alphabet_rules')}}">
                        <i class="icon-master"></i>
                        <span>{{__('thailand.add_rule')}}</span>
                    </a>
                </li>
                <li  class="{{(request()->segment(1) == 'alphabet' ? 'at-active': '' )}}">
                    <a href="{{route('admin_all_alphabet_rules')}}">
                        <i class="icon-master"></i>
                        <span>{{__('thailand.alphabet_rule')}}</span>
                    </a>
                </li>
                <li class="{{(request()->segment(2) == 'user' ? 'at-active': '' )}}">
                    <a href="{{route('admin_create_user')}}">
                        <i class="icon-student"></i>
                        <span>{{__('thailand.users')}}</span>
                    </a>
                </li>
                <li class="{{(request()->segment(2) == 'rater' ? 'at-active': '' )}}">
                    <a href="{{route('admin_rater_list')}}">
                        <i class="icon-raters"></i>
                        <span>{{__('thailand.raters')}}</span>
                    </a>
                </li>
                <li class="{{(request()->segment(2) == 'rating' ? 'at-active': '' )}}">
                    <a href="{{route('admin_rating_detail')}}">
                        <i class="icon-rating"></i>
                        <span>{{__('thailand.rating')}}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- <div class="at-logoutholder">
        <a href="{{route('logout')}}">
            <i class="icon-logout"></i>
            <span>Logout</span>
        </a>
    </div> -->
</div>











{{--<div id="at-sidebarwrapper" class="at-sidebarwrapper">--}}
{{--    <div class="at-sidebbtnholder">--}}
{{--       <!--  <a id="at-btnopensidebar" class="at-btnopensidebar" href="javascript:void(0);">--}}
{{--            <span></span>--}}
{{--        </a>--}}
{{--        <a class="at-closesidebar" href="javascript:void(0);">--}}
{{--            <i class="icon-cancel"></i>--}}
{{--        </a> -->--}}
{{--        <strong class="at-logo"><a href="#"><img src="{{asset('assets/images/logo.png')}}" alt="company logo here"></a></strong>--}}
{{--        <a id="at-btnopensidebar" class="at-btnopensidebar" href="javascript:void(0);"><i class="fa fa-bars"></i></a>--}}
{{--    </div>--}}
{{--    <div class="at-themescrollbar">--}}
{{--        <nav id="at-nav" class="at-nav">--}}
{{--            <ul id="sidebarnav">--}}
{{--                <li >--}}
{{--                    <a href="{{route('admin_dashboard')}}">--}}
{{--                        <i class="icon-dashboard"></i>--}}
{{--                        <span>Dashboard</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="at-hasdropdown">--}}
{{--                    <a href="javascript:void(0);">--}}
{{--                        <!-- <span class="at-onlinedot"></span> -->--}}
{{--                        <i class="fa fa-book"></i>--}}
{{--                        <span>Chapter</span>--}}
{{--                    </a>--}}
{{--                    <ul class="at-dropdownmenu">--}}
{{--                        <li><a href="{{route('admin_create_chapter')}}">Create Chapter</a></li>--}}
{{--                        <li><a href="{{route('admin_chapter_list')}}">Chapter List</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="at-hasdropdown">--}}
{{--                    <a href="javascript:void(0);">--}}
{{--                        <!-- <span class="at-onlinedot"></span> -->--}}
{{--                        <i class="fa fa-bookmark"></i>--}}
{{--                        <span>Alphabets</span>--}}
{{--                    </a>--}}
{{--                    <ul class="at-dropdownmenu">--}}
{{--                        <li><a href="{{route('admin_create_alphabet')}}">Create Alphabet</a></li>--}}
{{--                        <li><a href="{{route('admin_alphabet_list')}}">Alphabet List</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="at-hasdropdown">--}}
{{--                    <a href="javascript:void(0);">--}}
{{--                        <!-- <span class="at-onlinedot"></span> -->--}}
{{--                        <i class="fa fa-user"></i>--}}
{{--                        <span>Master</span>--}}
{{--                    </a>--}}
{{--                    <ul class="at-dropdownmenu">--}}
{{--                        <li><a href="{{route('admin_invite_master')}}">invite master</a></li>--}}
{{--                        <li><a href="{{route('admin_master_list')}}">master list</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="at-hasdropdown">--}}
{{--                    <a href="javascript:void(0);">--}}
{{--                        <!-- <span class="at-onlinedot"></span> -->--}}
{{--                        <i class="fa fa-user"></i>--}}
{{--                        <span>Student</span>--}}
{{--                    </a>--}}
{{--                    <ul class="at-dropdownmenu">--}}
{{--                        <li><a href="{{route('admin_invite_student')}}">invite student</a></li>--}}
{{--                        <li><a href="{{route('admin_student_list')}}">student list</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="at-hasdropdown">--}}
{{--                    <a href="javascript:void(0);">--}}
{{--                        <!-- <span class="at-onlinedot"></span> -->--}}
{{--                        <i class="fa fa-user"></i>--}}
{{--                        <span>Rating</span>--}}
{{--                    </a>--}}
{{--                    <ul class="at-dropdownmenu">--}}
{{--                        <li><a href="{{route('admin_rated_recording')}}">Rated Recording</a></li>--}}
{{--                        <li><a href="{{route('admin_unRated_recording')}}">Unrated Recording</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <!-- <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="icon-settings"></i>--}}
{{--                        <span>Settings</span>--}}
{{--                    </a>--}}
{{--                </li> -->--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--    <div class="at-btnlogoutholer">--}}
{{--        <a class="at-btnlogout at-btn"  href="{{route('logout')}}">--}}
{{--            <i class="icon-logout"></i>--}}
{{--            <span>Logout</span>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</div>--}}
