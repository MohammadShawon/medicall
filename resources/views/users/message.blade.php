@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" class="main-content">
        <section class="wrapper">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel-body">
                            @foreach($users as $user)
                                <table class="table table-responsive table-bordered">
                                    <tr>
                                        <td>
                                            <img src="{{ $user['photo'] }}">
                                            {{ $user['name'] }}
                                          <span> ( {{ $user->role }} )</span>
                                        </td>
                                        <td>
                                            <a href="{{route('message.read', ['id'=>$user->id])}}" class="btn btn-success pull-right">Send Message</a>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </section>

    <!--main content end-->

    @include('users.partials.user-footer')
@endsection