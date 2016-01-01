elixir = require 'laravel-elixir'

bowerPath = (parts...)-> ['.','bower_components'].concat(parts).join('/')

elixir (mix)->

    mix.styles [
      bowerPath('bootstrap','dist','css','bootstrap.min.css')
      bowerPath('bootstrap','dist','css','bootstrap-theme.min.css')
    ], 'public/css/vendor.css'

    mix.sass 'app.scss'

    mix.scripts [
      bowerPath('jquery','dist', 'jquery.min.js')
      bowerPath('bootstrap','dist','js','bootstrap.min.js')
      bowerPath('angular','angular.min.js')
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

