
@extends('admin.layout-admin')

@section('content')
    @include('admin.partials.admin-nav')
    @include('admin.partials.admin-sidebar')
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
                                <th><i class="icon_cogs"></i> Action</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->doctor->hospital->name }}</td>
                                    <td>{{ $user->doctor->bdmo_no }}</td>
                                    <td>{{ $user->doctor->speciality }}</td>
                                    <td>
                                        <div class="btn-group">
                                            {{--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>--}}
                                            <a class="btn btn-primary" onclick="verify({{ $user->id }})"><i class="icon_pencil-edit"></i></a>
                                            {{--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>--}}
                                            <a class="btn btn-danger" onclick="decline({{ $user->id }})"><i class="icon_close_alt2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>

    @include('users.partials.user-footer')

@endsection
<script>
    function verify(id) {
        $.post('/admin/doctor/'+id+'/approve', {_token: '{{ csrf_token() }}'})
            .done(function (success) {
                swal('SUCCESS!', success.message, 'success');
            })
            .fail(function (error) {
                swal('ERROR!', 'Error approving application.', 'error');
            });
    }

    function decline(id) {
        $.post('/admin/doctor/'+id+'/decline', {_token: '{{ csrf_token() }}'})
            .done(function (success) {
                swal('SUCCESS!', success.message, 'success');
            })
            .fail(function (error) {
                swal('ERROR!', 'Error declining application.', 'error');
            });
    }
</script>
