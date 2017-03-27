@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->
        <section id="main-content" class="main-content">
            <section class="wrapper">
                <!-- page start-->

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th><i class="icon_book"></i> Appointmnet ID</th>
                                    <th><i class="icon_profile"></i> Patient Name</th>
                                    <th><i class="icon_mail_alt"></i> Appointment Date</th>
                                    <th><i class="icon_calendar"></i> Appointment Time</th>
                                    <th><i class="icon_mobile"></i> Mobile</th>
                                    <th><i class="icon_cogs"></i> Action</th>
                                </tr>
                                <tr>
                                    <td>1710322987</td>
                                    <td>Mr.PAtient</td>
                                    <td>2004-07-06</td>
                                    <td>5.00pm</td>
                                    <td>01670032464</td>
                                    <td>
                                        <div class="btn-group">
                                            {{--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>--}}
                                            <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                            <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1320301612</td>
                                    <td>Mr.Patient</td>
                                    <td>2011-01-10</td>
                                    <td>4.00pm</td>
                                    <td>01716533428</td>
                                    <td>
                                        <div class="btn-group">
                                            {{--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>--}}
                                            <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                            <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <!-- page end-->
            </section>
        </section>
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection