<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="/profile">
                    <i class="icon_house_alt"></i>
                    <span>My Board</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="/profile" class="">
                    <i class="icon_document_alt"></i>
                    <span>My Info</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <!--<ul class="sub">
                    <li><a class="" href="form_component.html">Form Elements</a></li>
                    <li><a class="" href="form_validation.html">Form Validation</a></li>
                </ul> -->
            </li>
            @if(auth()->user()->isUser())
            <li class="sub-menu">
                <a href="/appointment" class="">
                    <i class="icon_desktop"></i>
                    <span>Make Appointment</span>
                    <!-- <span class="menu-arrow arrow_carrot-right"></span> -->
                </a>
               <!-- <ul class="sub">
                    <li><a class="" href="general.html">Components</a></li>
                    <li><a class="" href="buttons.html">Buttons</a></li>
                    <li><a class="" href="grids.html">Grids</a></li>
                </ul>
                -->
            </li>

                <li class="sub-menu">
                <a href="/appointment/list" class="">
                    <i class="icon_desktop"></i>
                    <span>My Appointment</span>
                    <!-- <span class="menu-arrow arrow_carrot-right"></span> -->
                </a>
               <!-- <ul class="sub">
                    <li><a class="" href="general.html">Components</a></li>
                    <li><a class="" href="buttons.html">Buttons</a></li>
                    <li><a class="" href="grids.html">Grids</a></li>
                </ul>
                -->
            </li>
            @endif

            @if(auth()->user()->isDoctor())
            <li>
                <a class="" href="/appointment/patientlist">
                    <i class="icon_genius"></i>
                    <span>My Appointment</span>
                </a>
            </li>

            {{--<li>--}}
                {{--<a class="" href="#">--}}
                    {{--<i class="icon_genius"></i>--}}
                    {{--<span>Prescription</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li>
                <a class="" href="/schedule">
                    <i class="icon_calendar"></i>
                    <span>Schedule</span>
                </a>
            </li>
                <li>
                <a class="" href="/schedule/list">
                    <i class="icon_calendar"></i>
                    <span>My Schedule</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->isBDMODoctor())
                <li>
                    <a class="" href="/doctors/apply">
                        <i class="icon_genius"></i>
                        <span>Verify BDMO</span>
                    </a>
                </li>
            @endif
            @if(auth()->user()->isUser())
            <li class="sub-menu">
                <a class="" href="javascript:;">
                    <i class="icon_piechart"></i>
                    <span>Ask Your Question</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="/ask">Tell</a></li>
                    <li><a class="" href="/ask/allquestion">All Question</a></li>
                    <li><a class="" href="/ask/question">My Question</a></li>
                </ul>

            </li>
            @endif

            @if(auth()->user()->isDoctor())
            <li class="sub-menu">
                <a class="" href="javascript:;">
                    <i class="icon_piechart"></i>
                    <span> Answers</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="/ask">Tell</a></li>
                    <li><a class="" href="/ask/allquestion">All Question</a></li>
                    <li><a class="" href="/ask/question">My Post</a></li>
                </ul>


            </li>
            @endif
            <li class="sub-menu">
                <a class="" href="javascript:;">
                    <i class="icon_piechart"></i>
                    <span>Messages</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="/messages">All User</a></li>
                    <li><a class="" href="#">New Message</a></li>
                    <li><a class="" href="#"><span>All Messages</span></a></li>
                    <li><a class="" href="#">Active</a></li>
                </ul>

            </li>

            {{--<li>--}}
                {{--<a class="" href="#">--}}
                    {{--<i class="icon_piechart"></i>--}}
                    {{--<span>Notifications</span>--}}

                {{--</a>--}}

            {{--</li>--}}

            {{--<li class="sub-menu">--}}
                {{--<a href="javascript:;" class="">--}}
                    {{--<i class="icon_table"></i>--}}
                    {{--<span>Credits</span>--}}
                    {{--<span class="menu-arrow arrow_carrot-right"></span>--}}
                {{--</a>--}}

            {{--</li>--}}

            {{--<li class="sub-menu">--}}
                {{--<a href="javascript:;" class="">--}}
                    {{--<i class="icon_documents_alt"></i>--}}
                    {{--<span>Share</span>--}}
                    {{--<span class="menu-arrow arrow_carrot-right"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub">--}}
                    {{--<li><a class="" href="#">Facebook</a></li>--}}
                    {{--<li><a class="" href="#"><span>Google Plus</span></a></li>--}}
                    {{--<li><a class="" href="#">Linked In</a></li>--}}
                    {{--<li><a class="" href="#">Twitter</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="sub-menu">--}}
            {{--<a href="javascript:;" class="">--}}
                {{--<i class="icon_table"></i>--}}
                {{--<span>About Us</span>--}}

            {{--</a>--}}

            {{--</li>--}}

            {{--<li class="sub-menu">--}}
            {{--<a href="javascript:;" class="">--}}
                {{--<i class="icon_table"></i>--}}
                {{--<span>Terms & Condition</span>--}}

            {{--</a>--}}

            {{--</li>--}}

            <li class="sub-menu">
                <form action="/logout" method="post" id="logout">{{ csrf_field() }}</form>
                <a class="" onclick="document.getElementById('logout').submit()"><i class="icon_key_alt"></i>Logout</a>
            {{--<a href="javascript:;" class="">--}}
                {{--<i class="icon_table"></i>--}}
                {{--<span>Logout</span>--}}

            {{--</a>--}}

            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>