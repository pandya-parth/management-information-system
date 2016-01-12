<!DOCTYPE html>
<html>
 <head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta charset="utf-8" />
      <title>MIS-@yield('title')</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <link rel="apple-touch-icon" href="img/ico/60.png">
      <link rel="apple-touch-icon" sizes="76x76" href="img/ico/76.png">
      <link rel="apple-touch-icon" sizes="120x120" href="img/ico/120.png">
      <link rel="apple-touch-icon" sizes="152x152" href="img/ico/152.png">
      <link rel="icon" type="image/x-icon" href="favicon.ico" />
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-touch-fullscreen" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="default">
      <meta content="" name="description" />
      <meta content="" name="author" />
            
        <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
</head>
<body ng-controller="BodyCtrl" class="fixed-header" id="app-layout">
    @include('shared.left_sidebar')
    <div class="page-container">
       @include('shared.header')
        @yield('content')    

      @include('shared.footer')
    </div>
<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>