<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user-md">User Name</i> </h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="">Home</a></li>
                    <li><i class="icon_documents_alt"></i>Pages</li>
                    <li><i class="fa fa-user-md"></i>Profile</li>
                </ol>
            </div>
        </div>
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