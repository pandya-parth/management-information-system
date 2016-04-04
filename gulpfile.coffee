elixir = require 'laravel-elixir'


bowerPath = (parts...)-> ['.','bower_components'].concat(parts).join('/')

elixir (mix)->

    mix.styles [
      'bootstrap.css'
      bowerPath('bootstrap','dist','css','bootstrap.min.css')
      'bootstrap-timepicker.min.css'
      'bootstrap-theme.css'
      'pace-theme-flash.css'
      'font-awesome.css'
      'jquery.scrollbar.css'
      'select2.css'
      'switchery.min.css'
      'pages-icons.css'
      'pages.css'
      'windows.chrome.fix.css'
      'angular-datepicker.css'
      'style.css'
    ], 'public/css/vendor.css'



    mix.sass 'app.scss'

    mix.scripts [
      'pace.min.js'
      bowerPath('jquery','dist', 'jquery.min.js')
      'modernizr.custom.js'
      'jquery-ui.min.js'
      bowerPath('bootstrap','dist','js','bootstrap.min.js')      
      bowerPath('bootstrap-timepicker','js','bootstrap-timepicker.js') 
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
      'plupload.full.min.js'
      bowerPath('angular', 'angular.js')
      bowerPath('angular-bootstrap', 'ui-bootstrap-tpls.js')
      bowerPath('angular-filter','dist','angular-filter.js')
      bowerPath('underscore', 'underscore.js')
      bowerPath('angular-utils-pagination', 'dirPagination.js')
      bowerPath('angular-prompt', 'dist', 'angular-prompt.js')
      bowerPath('angular-country-select','dist','angular-country-select.js')
      'angular-datepicker.js'
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