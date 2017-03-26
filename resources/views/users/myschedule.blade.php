@extends('users.layout')

@section('content')
    @include('users.user-nav')
    <!--sidebar start-->
    @include('users.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->

    @include('users.schedule-form')
    <!--main content end-->

    @include('users.user-footer')
@endsection