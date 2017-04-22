<section id="main-content" class="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="btn-group">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modal_add_category"> Add Category<i class="icon_plus_alt2"></i></a>
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
                            <th><i class="icon_book"></i>Category Name</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>

                            <td>
                                <div class="btn-group">
                                    {{--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>--}}
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#modal_update_category"><i class="icon_pencil-edit"></i></a>
                                    {{--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>--}}
                                    <a class="btn btn-danger" id="delcategory" onclick="deleteCategory()"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>

{{--Add Category--}}
<div class="modal fade" id="modal_add_category" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="cateogry" class="control-label">Category:</label>
                    <input type="text" class="form-control" id="category">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addCategory()">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

Update Category
<div class="modal fade" id="modal_update_category" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="cateogry" class="control-label">Category:</label>

                    <input type="text" class="form-control" id="cateogry" name="category_name" placeholder=" " value="{{ old('category_name') }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addCategory()">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->