<section id="main-content" class="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <form class="form-validate form-horizontal" method="post" action="">
                            <div class="form-group ">
                                <label for="place" class="control-label col-lg-2">Select Your Area<span class="required">*</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control" id="" name="division" list="division" type="text" required />
                                    <datalist id="division">
                                        <option value="Dhaka">
                                        <option value="RajShahi">
                                        <option value="Rangpur">
                                        <option value="Chittagong">
                                        <option value="Barisal">
                                    </datalist>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" id="" name="district" list="district" type="text" required />
                                    <datalist id="district">
                                        <option value="Dhaka">
                                        <option value="Gazipu">
                                        <option value="Naogaon">
                                        <option value="Bogra">
                                        <option value="Nymensing">
                                    </datalist>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary" type="submit">Find</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <div class="panel-body bio-graph-info">
            <h1 class="text-center">Select Category</h1>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-category">
                <ul >
                    <li class="active">
                        Medicine Specialist
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-category">
                <ul>
                    <li class="active">
                        Medicine Specialist
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-category">
                <ul>
                    <li class="active">
                        Medicine Specialist
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-category">
                <ul>
                    <li class="active">
                        Medicine Specialist
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-category">
                <ul>
                    <li class="active">
                        Medicine Specialist
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-category">
                <ul>
                    <li class="active">
                        Medicine Specialist
                    </li>

                </ul>
            </div>

        </div>


        {{-- Select Doctor--}}

        <div class="panel-body bio-graph-info">
            <h1 class="text-center">Choose Doctor</h1>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-name">
                <ul >
                    <li class="active">
                        MR Doctor <br>
                        <span> MBBS,Dhaka Medical College</span>
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-name">
                <ul>
                    <li class="active">
                        MR Doctor <br>
                        <span> MBBS,Dhaka Medical College</span>
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-name">
                <ul>
                    <li class="active">
                        MR Doctor <br>
                        <span> MBBS,Dhaka Medical College</span>
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-name">
                <ul>
                    <li class="active">
                        MR Doctor <br>
                        <span> MBBS,Dhaka Medical College</span>
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-name">
                <ul>
                    <li class="active">
                        MR Doctor <br>
                        <span> MBBS,Dhaka Medical College</span>
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 doctor-category" id="doctor-name">
                <ul>
                    <li class="active">
                        MR Doctor <br>
                        <span> MBBS,Dhaka Medical College</span>
                    </li>

                </ul>
            </div>

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
                            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                                <div class="form-group">
                                    <label for="hospitals" class="control-label col-lg-2">Select Hospital <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="" list="hospitals" placeholder=" " >

                                        <datalist id="hospitals">
                                            <option value="LABID">
                                            <option value="Bangladesh Medical">
                                            <option value="LUBANA">
                                            <option value="Appolo">
                                            <option value="DMC">
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="cname" name="fullname" minlength="5" type="text" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control " id="phone" type="tel" name="email" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="Problems" class="control-label col-lg-2">Problems</label>
                                    <div class="col-lg-10">
                                        <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="apdate" class="control-label col-lg-2">Appointment Date </label>
                                    <div class="col-lg-10">
                                        <input type="radio" class="" id="c-name" placeholder=" ">12/12/17
                                        <input type="radio" class="" id="c-name" placeholder=" ">12/12/17
                                        <input type="radio" class="" id="c-name" placeholder=" ">12/12/17
                                        <input type="radio" class="" id="c-name" placeholder=" ">12/12/17
                                        <input type="radio" class="" id="c-name" placeholder=" ">12/12/17
                                        <input type="radio" class="" id="c-name" placeholder=" ">12/12/17
                                        <input type="radio" class="" id="c-name" placeholder=" ">12/12/17
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="aptime" class="control-label col-lg-2">Appointment Time</label>
                                    <div class="col-lg-10">
                                        <input type="radio" class="" id="c-name" placeholder=" ">10am-12pm
                                        <input type="radio" class="" id="c-name" placeholder=" ">10am-12pm
                                        <input type="radio" class="" id="c-name" placeholder=" ">10am-12pm
                                        <input type="radio" class="" id="c-name" placeholder=" ">10am-12pm
                                        <input type="radio" class="" id="c-name" placeholder=" ">10am-12pm
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Age</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="occupation" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Address</label>
                                    <div class="col-lg-10">
                                        <textarea name="" id="address" class="form-control" cols="30" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-default" type="button">Cancel</button>
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