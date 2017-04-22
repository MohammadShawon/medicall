<section id="main-content" class="main-content">
    <section class="wrapper">
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<h3 class="page-header"><i class="fa fa-user-md">User Name</i> </h3>--}}
                {{--<ol class="breadcrumb">--}}
                    {{--<li><i class="fa fa-home"></i><a href="">Home</a></li>--}}
                    {{--<li><i class="icon_documents_alt"></i>Pages</li>--}}
                    {{--<li><i class="fa fa-user-md"></i>Profile</li>--}}
                {{--</ol>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <!-- profile-widget -->
            <div class="col-lg-12">
                <div class="profile-widget profile-widget-info">
                    <div class="panel-body">
                        <div class="col-lg-2 col-sm-2">
                            <h4> {{ $user->name }} </h4>
                            <div class="follow-ava">
                                <img src="{{ auth()->user()->photo }}" alt="">
                            </div>
                            <h6>{{ $user->role }}</h6>
                        </div>
                        <div class="col-lg-4 col-sm-4 follow-info">
                            <p>{{ $user->gender }}</p>
                            <p>CurrentTime</p>
                            <p><i class="icon_clock"></i> {{ date('H:i:s') }}</p>
                            <h5>
                                <span><i class="icon_clock_alt"></i>Created Time: {{ $user->created_at->toTimeString() }}</span>
                                <span><i class="icon_calendar"></i>Created Date: {{ $user->created_at->format('m/d/Y') }}</span>
                                <span><i class="icon_pin_alt"></i>{{ $user->city }}</span>
                            </h5>
                        </div>
                        <div class="col-lg-3 col-sm-6 follow-info weather-category">
                            <ul>
                                <li class="active">

                                    <i class="fa fa-comments fa-2x"> </i><br>

                                    Recent Posted question will be setted here.
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6 follow-info weather-category">
                            <ul>
                                <li class="active">

                                    <i class="fa fa-bell fa-2x"> </i><br>

                                    If Any Appointment created then appointment time notification will show here.
                                </li>

                            </ul>
                        </div>
                     <!--   <div class="col-lg-2 col-sm-6 follow-info weather-category">
                            <ul>
                                <li class="active">

                                    <i class="fa fa-tachometer fa-2x"> </i><br>

                                    Contrary to popular belief, Lorem Ipsum is not simply
                                </li>

                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            @yield('page')
            @include('users.page')
        </div>

        <!-- page end-->
    </section>
</section>