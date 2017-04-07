@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->

    @include('users.schedule-form')
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection