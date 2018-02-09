@extends('admin.layout-admin')

@section('content')
    @include('admin.partials.admin-nav')
    @include('admin.partials.admin-sidebar')
    @include('admin.partials.doctor-list-table')

    @include('users.partials.user-footer')

@endsection