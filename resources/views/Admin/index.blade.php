@extends('Admin.layout-admin')

{{--@section('content')--}}
    {{--@include('Admin.admin-nav')--}}
    {{--@include('Admin.admin-sidebar')--}}
    {{--@include('Admin.main-content')--}}
{{--@endsection--}}

@section('content')
    @include('Admin.admin-nav')
    <!--sidebar start-->
    @include('Admin.admin-sidebar')
    <!--sidebar end-->
    <!--main content start-->
    @include('Admin.main-content')
    <!--main content end-->
    @include('users.user-footer')
@endsection
