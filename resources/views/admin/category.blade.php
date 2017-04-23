@extends('admin.layout-admin')

@section('content')
    @include('admin.partials.admin-nav')
    @include('admin.partials.admin-sidebar')
    @include('admin.category-list-table')


    @include('users.partials.user-footer')

@endsection

@section('scripts')
    <script>
        window._token = '{{ csrf_token() }}';
        $(document).ready(function(){
            window.addCategory = function() {
                const category = $("#category");
                if(category.val().length<3) {
                    swal('STOP!', 'The Category has to be valid', 'warning');
                    return;
                }
                $.post('/admin/category/add', {
                    category: category.val(),
                    _token: window._token
                }).done(function (success) {
                    swal('SUCCESS!', 'New Category Added', 'success');
                    $('#modal_add_category').modal('hide');
                    category.val('');
                }).fail(function (error) {
                    swal('ERROR!', 'Error adding new Category', 'error');
                })
            };
            window.deleteCategory = function() {
                const delcategory = $("#delcategory");
                $.post('/admin/category/delete', {
                    category: delcategory.val(),
                    _token: window._token
                }).done(function (success) {
                    swal('SUCCESS!', ' Category Deleted', 'success');
                    delcategory.val('');
                }).fail(function (error) {
                    swal('ERROR!', 'Error Deleting  Category', 'error');
                })
            };

        });

    </script>
@endsection