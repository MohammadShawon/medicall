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
                            <th><i class="icon_calendar"></i> Gender</th>
                            <th><i class="icon_mobile"></i> Birthday</th>
                            <th><i class="icon_cogs"></i> Bio</th>
                            <th><i class="icon_cogs"></i> Occupation</th>
                            <th><i class="icon_cogs"></i> Blood Group</th>
                            <th><i class="icon_cogs"></i> Photo</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['address'] }}</td>
                            <td>{{ $user['phone'] }}</td>
                            <td>{{ $user['gender'] }}</td>
                            <td>{{ $user['birthday'] }}</td>
                            <td>{{ $user['bio'] }}</td>
                            <td>{{ $user['occupation'] }}</td>
                            <td>{{ $user['blood_group'] }}+</td>
                            <td>{{ $user['photo'] }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
<!--                                    {{--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>--}}-->
                                    <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>