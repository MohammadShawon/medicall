@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" class="main-content">
        <section class="wrapper">

            <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body bio-graph-info">
                            <h1>Apply as Doctor</h1>
                            <form class="form-horizontal" role="form" action="/doctors/request" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Hospital</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="hospital" id="hospital" placeholder=" " value="{{ old('hospital', '') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">BDMO No</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="bdmo_no" class="form-control" id="bdmo_no" placeholder=" " value="{{ old('bdmo_no', '') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Speciality</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="speciality" name="speciality" placeholder="MBBS" value="{{ old('speciality', '') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection

@section('scripts')
    <script>
        const hospitals = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '/hospitals/typeahead/q=a',
            remote: {
                url: '/hospitals/typeahead/q=%QUERY',
                wildcard: '%QUERY'
            }
        });

        $('#hospital').typeahead(null, {
            name: 'hospitals',
            source: hospitals
        });
    </script>
@endsection