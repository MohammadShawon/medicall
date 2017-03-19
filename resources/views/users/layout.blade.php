<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Medicall">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>User Profile</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/line-icons.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/lte-ie7.js"></script>
    <![endif]-->
    @yield('styles')
</head>

<body>
<!-- container section start -->
<section id="container" class="">

@yield('content')



</section>
@yield('scripts')
<script src="/js/sweetalert.min.js"></script>
<script>
    var msgshow = function(data) {
        // write what you want with this data

        console.log(data);
    }
</script>

{!! talk_live(['user'=>["id"=>auth()->user()->id, 'callback'=>['msgshow']]]) !!}
<script>
    window.onload = (function(){
        @foreach($errors->all() as $message)
          swal({
            title: "STOP!",
            text: "{{ str_replace("\"", "\\\"", $message) }}",
            type: "error",
            confirmButtonText: "OK"
        });
        @endforeach
          @if(Session::has('message'))
          swal({
            title: "SUCCESS!",
            text: "{{ str_replace("\"", "\\\"", Session::get('message')) }}",
            type: "success",
            confirmButtonText: "OK"
        });
        @endif
    });
</script>
</body>
</html>
