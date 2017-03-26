@extends('Admin.layout-admin')

@section('content')
    @include('Admin.admin-nav')
    @include('Admin.admin-sidebar')
    @include('Admin.patient-list-table')

    @include('users.user-footer')

@endsection