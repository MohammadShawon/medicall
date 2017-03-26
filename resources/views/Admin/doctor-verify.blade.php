
@extends('Admin.layout-admin')

@section('content')
    @include('Admin.admin-nav')
    @include('Admin.admin-sidebar')
    <section id="main-content" class="main-content">
        <section class="wrapper">
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th><i class="icon_book"></i>Name</th>
                                <th><i class="icon_profile"></i> Address</th>
                                <th><i class="icon_mail_alt"></i> Phone No</th>
                                <th><i class="icon_calendar"></i> Hospital</th>
                                <th><i class="icon_mobile"></i> BDMO Number</th>
                                <th><i class="icon_cogs"></i> Speciality</th>
                            </tr>
                            <tr>
                                <td>Mr.Doctor</td>
                                <td>GAzipur,Dhaka</td>
                                <td>01670032464</td>
                                <td>BDMC</td>
                                <td>1234568790</td>
                                <td>
                                    <div class="btn-group">
                                        {{--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>--}}
                                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Mr.Doctor</td>
                                <td>GAzipur,Dhaka</td>
                                <td>01670032464</td>
                                <td>BDMC</td>
                                <td>1234568790</td>
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

    @include('users.user-footer')

@endsection
