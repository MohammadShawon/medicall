<section id="main-content" class="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="btn-group">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modal_add_hospital"> Add Hospitals<i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-warning" href="#"> Edit Hospitals<i class="icon_pencil-edit"></i></a>
                        <a class="btn btn-danger" href="#"> Delete Hospitals<i class="icon_close"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <table class="table table-striped table-advance table-hover table-responsive">
                        <tbody>
                        <tr>
                            <th><i class="icon_book"></i>Hospital name</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @foreach($hospitals as $hospital)
                            <tr>
                                <td>{{ $hospital->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        {{--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>--}}
                                        <a class="btn btn-primary" href="#"><i class="icon_pencil-edit"></i></a>
                                        {{--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>--}}
                                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>

        {{--Hospital List--}}
        <div class="modal fade" id="modal_add_hospital" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Hospital</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="division" class="control-label">Division:</label>
                            <select name="division" id="division" class="form-control" onchange="loadDistricts()" required>
                                <option>Select One</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district" class="control-label">District:</label>
                            <select name="district" id="district" class="form-control" required>
                                <option>Select One</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hospital" class="control-label">Hospital:</label>
                            <input type="text" name="hospital" id="hospital" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addHospital()">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- page end-->
    </section>
</section>
<script>
    function addHospital() {
        const division = $("#division");
        const district = $("#district");
        const hospital = $("#hospital");
        if(division.val()===null) {
            swal('STOP!', 'Select a division', 'warning');
            return;
        }
        if(district.val()===null) {
            swal('STOP!', 'Select a district', 'warning');
            return;
        }
        if(hospital.val().length<5) {
            swal('STOP!', 'Input the hospital name', 'warning');
            return;
        }
        $.post('/admin/hospitals/add', {
            division: division.val(),
            district: district.val(),
            hospital: hospital.val(),
            _token: '{{ csrf_token() }}'
        })
            .done(function (success) {
                swal('SUCCESS!', success.message, 'success');
                $("#modal_add_hospital").modal('hide');
            })
            .fail(function (error) {
                error = error.responseJSON;
                Object.keys(error).forEach(function (x) {
                    swal('ERROR', error[x][0], 'error');
                });
            });
    }
    function loadDistricts() {
        const division = $("#division");
        const district = $("#district");
        $.get('/admin/divisions/'+division.val()+'/districts')
            .done(function (districts) {
                district.html($("<option>Select One</option>"));
                districts.forEach(function (d) {
                    const option = $("<option value='"+d.id+"'>"+d.name+"</option>");
                    district.append(option);
                });
            })
            .fail(function (error) {
                Object.keys(error).forEach(function (x) {
                    swal('ERROR', error[x][0], 'error');
                });
            });
    }
</script>