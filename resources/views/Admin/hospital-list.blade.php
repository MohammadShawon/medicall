@extends('Admin.layout-admin')

@section('content')
    @include('Admin.admin-nav')
    @include('Admin.admin-sidebar')
    @include('Admin.hospital-list-table')

    @include('users.user-footer')

@endsection