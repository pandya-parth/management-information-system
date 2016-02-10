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
      'bootstrap-timepicker.min.css',
      'flags.css',
      'style.css',
    ], 'public/css/vendor.css'



    mix.sass 'app.scss'

    mix.scripts [
      'pace.min.js'
      bowerPath('jquery','dist', 'jquery.min.js')
      'modernizr.custom.js'
      'jquery-ui.min.js'
      bowerPath('bootstrap','dist','js','bootstrap.min.js')
      'jquery.unveil.min.js'
      'jquery.bez.min.js'
      'jquery.ioslist.min.js'
      'jquery.actual.min.js'
      'jquery.scrollbar.min.js'
      'select2.min.js'
      'classie.js'
      'switchery.min.js'
      'jquery.dataTables.min.js'
      'dataTables.tableTools.min.js'
      'jquery-datatable-bootstrap.js'
      'datatables.responsive.js'
      'lodash.min.js'
      'pages.min.js'
      'datatables.js'
      'bootstrap-timepicker.min.js'
      'bootstrap-datepicker.js'
      'plupload.full.min.js'
      'jquery.flagstrap.js'
      bowerPath('angular', 'angular.min.js')
      bowerPath('underscore', 'underscore.js')
      bowerPath('angular-bootstrap', 'ui-bootstrap-tpls.js')
      bowerPath('angular-utils-pagination', 'dirPagination.js')
      bowerPath('angular-prompt', 'dist', 'angular-prompt.js')
      'scripts.js'
    ], 'public/js/vendor.js'

    mix.coffee [
      '*.coffee'
      'config/*.coffee'
      'controllers/*.coffee'
      'services/*.coffee'
    ]

    mix.version [
      'css/vendor.css'
      'css/app.css'
      'js/vendor.js'
      'js/app.js'
    ]