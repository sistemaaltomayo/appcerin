<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sistemas de Planillas">
    <meta name="author" content="Cinthia Vivanco Gonzales">

    <link rel="icon" href="{{ asset('public/img/icono/cerin.ico') }}">    
    <title>Cerin</title>


    <link rel="stylesheet" type="text/css" href="{{ asset('public/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/lib/material-design-icons/css/material-design-iconic-font.min.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/font-awesome.min.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/lib/scroll/css/scroll.css') }} "/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    @yield('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/alfasweb.css?v='.$version) }} "/>

  </head>
  <body>


    <div class="be-wrapper be-fixed-sidebar">

        @include('success.ajax-alert')
        @include('success.bienhecho', ['bien' => Session::get('bienhecho')])
        @include('error.erroresurl', ['error' => Session::get('errorurl')])

        @include('menu.nav-top')
        @include('menu.nav-left')

        @include('success.xml', ['xml' => Session::get('xmlmsj')])

        @yield('section')

         <input type='hidden' id='carpeta' value="{{$capeta}}"/>
         <input type="text" id="token" name="_token"  value="{{ csrf_token() }}"> 
    </div>


    <script src="{{ asset('public/lib/jquery/jquery-2.1.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/scroll/js/jquery.mousewheel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/scroll/js/jquery-scrollpanel-0.7.0.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/lib/scroll/js/scroll.js') }}" type="text/javascript"></script>   
    <script src="{{ asset('public/js/general/general.js') }}" type="text/javascript"></script>

    @yield('script')

  </body>
</html>