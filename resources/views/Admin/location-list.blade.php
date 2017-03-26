@extends('Admin.layout-admin')

@section('content')
    @include('Admin.admin-nav')
    @include('Admin.admin-sidebar')
    @include('Admin.location-list-table')

    @include('users.user-footer')

@endsection