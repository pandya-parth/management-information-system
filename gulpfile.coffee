elixir = require 'laravel-elixir'

bowerPath = (parts...)-> ['.','bower_components'].concat(parts).join('/')

elixir (mix)->

    mix.styles [
      bowerPath('bootstrap','dist','css','bootstrap.min.css')
      bowerPath('bootstrap','dist','css','bootstrap-theme.min.css')
      'pace-theme-flash.css',
      'font-awesome.css',
      'jquery.scrollbar.css',
      'select2.css',
      'switchery.min.css',
      'pages-icons.css',
      'pages.css',
      'windows.chrome.fix.css',
      'datepicker3.css',
      'daterangepicker-bs3.css',
      'bootstrap-timepicker.min.css',
    ], 'public/css/vendor.css'



    mix.sass 'app.scss'

    mix.scripts [
      bowerPath('jquery','dist', 'jquery.min.js')
      bowerPath('bootstrap','dist','js','bootstrap.min.js')
      'pace.min.js',
      'modernizr.custom.js',
      'jquery-ui.min.js',
      'jquery-easy.js',
      'jquery.unveil.min.js',
      'jquery.bez.min.js',
      'jquery.ioslist.min.js',
      'jquery.actual.min.js',
      'jquery.scrollbar.min.js',
      'select2.min.js',
      'classie.js',
      'switchery.min.js',
      'pages.min.js',
      'scripts.js',
      'angular.min.js',
      'jquery.dataTables.min.js',
      'dataTables.tableTools.min.js',
      'jquery-datatable-bootstrap.js',
      'datatables.responsive.js',
      'lodash.min.js',
      'pages.min.js',
      'datatables.js',
      'bootstrap-timepicker.min.js',
      'daterangepicker.js',
      'bootstrap-datepicker.js',
    ], 'public/js/vendor.js'

    mix.coffee [
      'app.coffee'
      'config/*.coffee'
      'controllers/*.coffee'
    ]

    mix.version [
      'css/vendor.css'
      'css/app.css'
      'js/vendor.js'
      'js/app.js'
    ]