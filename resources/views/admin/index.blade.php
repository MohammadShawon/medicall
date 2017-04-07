@extends('admin.layout-admin')

{{--@section('content')--}}
    {{--@include('Admin.admin-nav')--}}
    {{--@include('Admin.admin-sidebar')--}}
    {{--@include('Admin.main-content')--}}
{{--@endsection--}}

@section('content')
    @include('admin.partials.admin-nav')
    <!--sidebar start-->
    @include('admin.partials.admin-sidebar')
    <!--sidebar end-->
    <!--main content start-->
    @include('admin.partials.main-content')
    <!--main content end-->
    @include('users.partials.user-footer')
@endsection
