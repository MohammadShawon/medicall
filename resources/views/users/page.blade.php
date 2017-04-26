<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading tab-bg-info">
            <ul class="nav nav-tabs">
                @if(auth()->user()->isDoctor())
                <li class="active">
                    <a data-toggle="tab" href="#recent-activity">
                        <i class="icon-home"></i>
                        My Post
                    </a>
                </li>
                @endif
                    @if(auth()->user()->isUser())
                <li class="active">
                    <a data-toggle="tab" href="#recent-activity">
                        <i class="icon-home"></i>
                        My Question
                    </a>
                </li>
                @endif
                {{--<li class="">--}}
                    {{--<a data-toggle="tab" href="#appointment">--}}
                        {{--<i class="icon-envelope"></i>--}}
                        {{--Appointment--}}
                    {{--</a>--}}
                {{--</li>--}}
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
        <div class="panel-body">
            <div class="tab-content">
                @include('users.questions')
                <!-- profile -->
                @include('users.myinfo')
                <!-- edit-profile -->
                @include('users.editinfo')

                <!-- Appointment form starts  -->
                {{--@include('users.myappointment')--}}
            </div>
        </div>
    </section>
</div>