
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Medicall</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstarp Js -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
    @yield('stylesheet')


  </head>
  <body>

  @include('layouts.nav-home')

  <div class="content">
       @yield('content')
   </div> 


   @include('layouts.footer')
  <script src="/js/sweetalert.min.js"></script>
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
