<div id="edit-profile" class="tab-pane">
    <section class="panel">
        <div class="panel-body bio-graph-info">
            <h1> Profile Info</h1>
            <form class="form-horizontal" role="form" action="/profile" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="name" placeholder=" " value="{{ old('name', $user->name) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">About Me</label>
                    <div class="col-lg-10">
                        <textarea name="about_me" id="" class="form-control" cols="30" rows="5">{{ old('about_me', $user->bio) }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">City</label>
                    <div class="col-lg-6">
                        <input type="text" name="city" class="form-control" id="city" placeholder=" " value="{{ old('city', $user->city) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Birthday</label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder=" " value="{{ old('date_of_birth', $user->dob) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Occupation</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="occupation" id="occupation" placeholder=" " value="{{ old('occupation', $user->occupation) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Phone</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder=" " value="{{ old('phone', $user->phone) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Blood Group</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="blood_group" name="blood_group" placeholder=" " value="{{ old('blood_group', $user->blood_group) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-6">
                        <textarea name="" id="address" name="address" class="form-control" cols="30" rows="2">{{ old('address', $user->address) }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>