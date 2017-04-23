<section id="main-content" class="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="hospitals">Hospital</label>
                            <input type="text" id="hospital" name="hospital" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" onclick="loadHospitalLocation()">Find</button>
                        </div>
                        <div class="row" id="hospitals_selection"></div>
                    </div>
                </section>
            </div>
        </div>
        <div class="panel-body bio-graph-info">
            <h1 class="text-center">Select Category</h1>
            <div id="category_list"></div>
        </div>


        {{-- Select Doctor--}}

        <div class="panel-body bio-graph-info">
            <h1 class="text-center">Choose Doctor</h1>
            <div id="doctors_list"></div>
        </div>
        {{-- Select Doctor end--}}


        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header text-center"> Make Appointment</h3>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/appointment/make">
                                {{ csrf_field() }}
                                <input type="hidden" name="hospital_id" id="hidden_hospital_id" value="{{ old("hospital_id") }}" required>
                                <input type="hidden" name="doctor_id" id="hidden_doctor_id" value="{{ old("doctor_id") }}" required>
                                <div class="form-group ">
                                    <label for="Problems" class="control-label col-lg-2">Problems</label>
                                    <div class="col-lg-10">
                                        <textarea name="issue" id="" class="form-control" cols="30" rows="5" required>{{ old("issue") }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="apdate" class="control-label col-lg-2">Appointment Time</label>
                                    <input type="date" name="schedule_date" class="form-control" id="date-input" value="{{ old("schedule_date") }}" required>
                                    <div class="col-lg-10" id="schedule-list">
                                        @if(old("schedule_id"))
                                            <input type="hidden" name="schedule_id" value="{{ old("schedule_id") }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>

        <!-- page end-->
    </section>
</section>