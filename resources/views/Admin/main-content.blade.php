<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <!-- profile-widget -->
            <div class="col-lg-12">
                <div class="profile-widget profile-widget-info">
                    <div class="panel-body">

                        <header class="panel-heading tab-bg-info">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#doctor-manage">
                                        Doctor List
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#appointment">
                                        <i class="icon-envelope"></i>
                                        Appointment
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#profile">
                                        <i class="icon-user"></i>
                                        My Info
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#edit-profile">
                                        <i class="icon-envelope"></i>
                                        Edit Info
                                    </a>
                                </li>

                            </ul>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            @yield('page')
            <div class="panel-body">
                <div class="tab-content">
                @include('users.questions')
                <!-- profile -->
                @include('users.myinfo')
                <!-- edit-profile -->
                @include('users.editinfo')

                <!-- Appointment form starts  -->
                    @include('users.myappointment')
                </div>
            </div>
        </div>

        <!-- page end-->
    </section>
</section>