
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta name="csrf-token" content="{{csrf_token()}}">
	<meta charset="UTF-8">
	<title>ES FOREX Trading System</title>
	
	<!-- CSS -->
    <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/orders.css') }}" rel="stylesheet">
    <link href="{{ asset('css/funds.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/indicator-lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/help.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" rel="stylesheet" type="text/css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script> -->
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <!-- <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script> -->
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-stock.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-annotations.min.js"></script>
    <script src="https://mighty-headland-26950.herokuapp.com/socket.io/socket.io.js"></script>

    <script type="text/javascript" src="{{ URL::asset('js/common.js') }}"></script>   
    <script type="text/javascript" src="{{ URL::asset('js/funds.js') }}"></script>   
    <script type="text/javascript" src="{{ URL::asset('js/order.js') }}"></script>   
    <script type="text/javascript" src="{{ URL::asset('js/home.js') }}"></script>   

   
  <!-- Bootstrap Studio -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    
</head>

<body class="body-background">
<div class="">
   <header class="">
       @include('includes.header')
   </header>
           @yield('content')
   <footer class="row">
       @include('includes.footer')
   </footer>
</div>
</body>

</html>



