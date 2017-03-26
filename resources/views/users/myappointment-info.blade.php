@extends('users.layout')

@section('content')
    @include('users.user-nav')
    <!--sidebar start-->
    @include('users.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" class="main-content">
        <section class="wrapper">
            <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                        <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                                <h4> {{ $user->name }} </h4>
                                <div class="follow-ava">
                                    <img src="img/profile-widget-avatar.jpg" alt="">
                                </div>
                                <h6>{{ $user->role }}</h6>
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                <p>{{ $user->bio }}</p>
                                <p>@mytwwiter</p>
                                <p><i class="fa fa-twitter">My Twwet</i></p>
                                <h6>
                                    <span><i class="icon_clock_alt"></i>11:05 AM</span>
                                    <span><i class="icon_calendar"></i>25.10.13</span>
                                    <span><i class="icon_pin_alt"></i>Dhaka</span>
                                </h6>
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                @yield('page')
                <div class="col-lg-12">
                    <div class="panel">
                        <header>
                            <h2 class="text-center">
                                Appointment Details
                            </h2>
                        </header>
                        <div class="appointment-info">
                            <span>Appointment ID:</span> <p>123485958</p>
                        </div>

                        <div class="appointment-info">
                            <span>Name:</span> <p>Md. Morshadun Nur</p>
                        </div>

                        <div class="appointment-info">
                            <span>Phone:</span> <p>Md. Morshadun Nur</p>
                        </div>

                        <div class="appointment-info">
                            <span>Problems:</span> <p>Md. Morshadun Nur</p>
                        </div>

                        <div class="appointment-info">
                            <span>Appointment Date:</span> <p>Md. Morshadun Nur</p>
                        </div>

                        <div class="appointment-info">
                            <span>Appointment Time:</span> <p>Md. Morshadun Nur</p>
                        </div>

                        <div class="appointment-info">
                            <span>Age:</span> <p>Md. Morshadun Nur</p>
                        </div>

                        <div class="appointment-info">
                            <span>Address:</span> <p>Md. Morshadun Nur</p>
                        </div>

                        <div class="appointment-info">
                            <span>Doctor's Name:</span> <p>Md. Morshadun Nur</p>
                        </div>

                        <div class="appointment-info">
                            <span>Hospitals/Chamber:</span> <p>Md. Morshadun Nur</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

    @include('users.user-footer')
@endsection