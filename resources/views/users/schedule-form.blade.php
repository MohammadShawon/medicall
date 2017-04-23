<section id="main-content" class="main-content">
    <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <h2 class="text-center">Set Your Schedule</h2>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                                    <div class="form-group">
                                        <label for="hospitals" class="control-label col-lg-2">Set Hospital/Chamber <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="" name="hospitals" placeholder=" " >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Select Day <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control"  name="day" list="day" type="text" required />
                                            <datalist id="day">
                                                <option value="Sunday"></option>
                                                <option value="Monday"></option>
                                                <option value="Tuesday"></option>
                                                <option value="Wednesday"></option>
                                                <option value="Thursday"></option>
                                                <option value="Friday"></option>
                                                <option value="Saturday"></option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Set Time<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class="form-control " id="" type="time" name="fromTime" required />
                                        </div>
                                        <div class="col-lg-2 text-center"><span>To</span></div>
                                        <div class="col-lg-4">
                                            <input class="form-control " id="" type="time" name="toTime" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="Problems" class="control-label col-lg-2">Appointment Limit</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="limit" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Set</button>
                                            <button class="btn btn-danger" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
    </section>
</section>