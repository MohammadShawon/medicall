@extends('admin.layout-admin')

@section('content')
    @include('admin.partials.admin-nav')
    @include('admin.partials.admin-sidebar')
    @include('admin.partials.location-list-table')
    {{--Add Division--}}
    <div class="modal fade" id="modal_add_division" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Division</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="division" class="control-label">Division:</label>
                        <input type="text" class="form-control" id="division">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addDivision()">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--Add District--}}
    <div class="modal fade" id="modal_add_district" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add District</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="district_division" class="control-label">Division (Select from suggestions. Do not edit):</label>
                        <input type="text" class="form-control" id="district_division">
                    </div>
                    <div class="form-group">
                        <label for="district" class="control-label">District:</label>
                        <input type="text" class="form-control" id="district">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addDistrict()">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @include('users.partials.user-footer')

@endsection

@section('scripts')
    <script>
        window._token = '{{ csrf_token() }}';
        $(document).ready(function(){
            window.addDivision = function() {
                const division = $("#division");
                if(division.val().length<3) {
                    swal('STOP!', 'The division has to be valid', 'warning');
                    return;
                }
                $.post('/admin/divisions/add', {
                    division: division.val(),
                    _token: window._token
                }).done(function (success) {
                    swal('SUCCESS!', 'New Division Added', 'success');
                    $('#modal_add_division').modal('hide');
                    division.val('');
                }).fail(function (error) {
                    swal('ERROR!', 'Error adding new Division', 'error');
                })
            };

            window.addDistrict = function() {
                const division = $("#district_division");
                const district = $("#district");
                if(division.val()===null) {
                    swal('STOP!', 'Please select a division', 'warning');
                    return;
                }
                if(district.val().length<3) {
                    swal('STOP!', 'The district has to be valid', 'warning');
                    return;
                }
                $.post('/admin/districts/add', {
                    district: district.val(),
                    division: division.val(),
                    _token: window._token
                }).done(function (success) {
                    swal('SUCCESS!', 'New District Added', 'success');
                    $('#modal_add_district').modal('hide');
                    division.val('');
                }).fail(function (error) {
                    swal('ERROR!', 'Error adding new district', 'error');
                })
            };

            const divisions = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: '/admin/divisions/typeahead/q=a',
                remote: {
                    url: '/admin/divisions/typeahead/q=%QUERY',
                    wildcard: '%QUERY'
                }
            });

            $('#district_division').typeahead(null, {
                name: 'division',
                source: divisions
            });
        });
    </script>
@endsection