@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" class="main-content">
        <section class="wrapper">


                        <div class="panel panel-default">
                            <div class="panel-heading text-center">Ask Your Question</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Title</label>

                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                        <label for="question" class="col-md-4 control-label">Question</label>

                                        <div class="col-md-6">
                                            <textarea id="question" name="body" class="form-control" cols="30" rows="2">{{ old('body') }}</textarea>

                                            @if ($errors->has('question'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="annonyms" class="col-md-4 control-label">Annonyms</label>
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input name="annonyms" id="input-annonyms" value="1" type="radio" checked/>Annonyms
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input name="annonyms" id="input-annonyms" value="0" type="radio" />Not Annonyms
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Ask
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>




        </section>
    </section>
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection