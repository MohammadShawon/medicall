@extends('users.layout')

@section('content')
@include('Admin.admin-nav')
@include('Admin.admin-sidebar')
@include('Admin.main-content')

@endsection
@section('footer')
@include('users.user-footer')

@endsection