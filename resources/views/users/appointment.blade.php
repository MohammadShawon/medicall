@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->

    @include('users.appointment-form')
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection

@section('scripts')
    <script>
        (function() {
            var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

            var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

            Date.prototype.getMonthName = function() {
                return months[ this.getMonth() ];
            };
            Date.prototype.getDayName = function() {
                return days[ this.getDay() ];
            };
        })();
        window._token = '{{ csrf_token() }}';

        $(document).on("change", "#date-input", function(e) {
            if(window.schedules === undefined) return;
            var $date = new Date(e.target.value);
            var $schedules = schedules[$date.getDayName()];
            if($schedules === undefined) {
                $("#schedule-list").html("No schedule available");
            }
            else {
                var $list = $("#schedule-list");
                $list.html("");
                $schedules.forEach(function (schedule) {
                    function pad(num) {return ("0" + num).slice(-2);}
                    function time(t) {
                        var tt = t.split(':');
                        var hs = tt[0],
                            m=tt[1];
                        h = hs % 12;
                        h = h ? h : 12; // the hour '0' should be '12'
                        return  h + ':' +
                            pad(m) + '  ' +
                            (hs >= 12 ? 'PM' : 'AM');
                    }
                    $list.append("<input type='radio' name='schedule_id' value='"+schedule.id+"' class='form-control'> " + time(schedule.time_from) + " - " + time(schedule.time_to));
                });
            }
        });
        $(document).ready(function(){
            $(document).on("change", "input[name=schedule_id]", function (e) {
                var $schedule_id = e.target.value;
            });
            $(document).on("click", "#doctor-name", function (e) {
                var $target = $(e.target).closest("#doctor-name");
                var $doctor_id = $target.attr("data-doctor-id");
                $("#doctor-name").removeClass("active");
                $target.addClass("active");
                $("#hidden_doctor_id").val($doctor_id);
                $.get("/schedule/doctor/"+$doctor_id+"/hospital/"+$("#hidden_hospital_id").val()).done(function (res) {
                    window.schedules = {};
                    res.map(function (r) {
                        if(schedules[r.day] === undefined)
                            schedules[r.day] = [r];
                        else
                            schedules[r.day].push(r);
                    });
                });
            });
            $(document).on("click", "#category", function (e) {
                $("#category").removeClass("active");
                var $target = $(e.target);
                $target.addClass("active");
                var $hospital_id = $("input[name=hospital_radio]").val();
                var $category_id = e.target.getAttribute("data-category-id");
                $("#hidden_hospital_id").val($hospital_id);
                $.get("/doctors/find/hospital/"+$hospital_id+"/category/"+$category_id).done(function (response) {
                    var $doctors_list = $("#doctors_list");
                    $doctors_list.html("");
                    response.forEach(function (doctor) {
                        var $doc = $(' <div class="col-lg-3 col-sm-6 doctor-category"> <ul > <li id="doctor-name" data-doctor-id="'+ doctor.user.id +'"> ' + doctor.user.name + ' <br> <span> ' + doctor.speciality + ', ' + doctor.hospital.name + '</span> </li> </ul> </div>');
                        $doctors_list.append($doc);
                    });
                });
            });
            $(document).on("click", "#hospital_radio", function (e) {
                var $list = $("#category_list");
                $.get("categories").done(function (response) {
                    $list.html("");
                    response.forEach(function (category) {
                        $list.append('<div class="col-lg-3 col-sm-6 doctor-category" id="doctor-category"><ul><li id="category" data-category-id="'+category.id+'">'+ category.category_name +'</li></ul></div>');
                    });
                })
            });
            window.loadHospitalLocation = function () {
                var $hospital = $("#hospital");
                $.get("/hospitals/"+$hospital.val()+"/location").done(function (response) {
                    var $form_data = '';
                    response.forEach(function (item) {
                        $form_data += "<div class='form-group'><input type='radio' id='hospital_radio' name='hospital_radio' value='" + item.hospital.id + "'>"+item.hospital.name+ ", " + item.district.name + ", " + item.division.name + "</div>";
                    });
                    $("#hospitals_selection").html($form_data);
                });
            };
            const hospitals = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: '/hospitals/typeahead/q=a',
                remote: {
                    url: '/hospitals/typeahead/q=%QUERY?fields=division,district',
                    wildcard: '%QUERY'
                }
            });

            $('#hospital').typeahead(null, {
                name: 'hospital',
                source: hospitals
            });
        });
    </script>
@endsection