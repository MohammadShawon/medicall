@extends('admin.layout-admin')

@section('content')
    @include('admin.partials.admin-nav')
    @include('admin.partials.admin-sidebar')
    @include('admin.category-list-table')

    @include('users.partials.user-footer')

@endsection