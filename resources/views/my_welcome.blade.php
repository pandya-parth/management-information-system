<!DOCTYPE html>
<html ng-app="app">
    <head>
        <title>MIS</title>
        <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    </head>
    <body ng-controller="BodyCtrl">
        <div class="container">
            <div class="content">
                <div class="title">{% title %}</div>
            </div>
        </div>

        <script src="{{ elixir('js/vendor.js') }}"></script>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
