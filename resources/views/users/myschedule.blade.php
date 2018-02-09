@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->

    @include('users.schedule-form')
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection


@section('scripts')
    <script>
        window._token = '{{ csrf_token() }}';
        $(document).ready(function(){

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
                name: 'hospital',
                source: hospitals
            });
        });
    </script>
@endsection