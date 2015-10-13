<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}} " >
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    </head>
    <body ng-app=@yield('ng-app')>
        <script src="{{asset('assets/js/angular.min.js')}}"></script>
        @yield('content')
    </body>
</html>