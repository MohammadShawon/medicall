@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->

    @include('users.schedule-list-table')
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection