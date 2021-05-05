<div id="at-sidebarwrapper" class="at-sidebarwrapper">
    <div class="at-sidebbtnholder">
        <!--  <a id="at-btnopensidebar" class="at-btnopensidebar" href="javascript:void(0);">
             <span></span>
         </a>
         <a class="at-closesidebar" href="javascript:void(0);">
             <i class="icon-cancel"></i>
         </a> -->
         <strong class="at-logo"><a href="#"><img src="{{asset('assets/images/logo.png')}}" alt="company logo here"></a></strong>
        <a id="at-btnopensidebar" class="at-btnopensidebar" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    </div>
    <div class="at-themescrollbar">
        <nav id="at-nav" class="at-nav">
            <ul id="sidebarnav">
                <li class="at-hasdropdown">
                    <a href="javascript:void(0);">
                        <!-- <span class="at-onlinedot"></span> -->
                        <i class="fa fa-user"></i>
                        <span>Recordings</span>
                    </a>
                    <ul class="at-dropdownmenu">
                        <li><a href="{{route('master_create_voice_enrollment')}}">Create Recording</a></li>
                        <li><a href="{{route('master_all_voice_enrollment')}}">Recording list</a></li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="#">
                        <i class="icon-settings"></i>
                        <span>Settings</span>
                    </a>
                </li> -->
            </ul>
        </nav>
    </div>
    <div class="at-btnlogoutholer">
        <a class="at-btnlogout at-btn"  href="{{route('logout')}}">
            <i class="icon-logout"></i>
            <span>Logout</span>
        </a>
    </div>
</div>
