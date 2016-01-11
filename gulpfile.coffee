elixir = require 'laravel-elixir'

bowerPath = (parts...)-> ['.','bower_components'].concat(parts).join('/')

elixir (mix)->

    mix.styles [
      bowerPath('bootstrap','dist','css','bootstrap.min.css')
      bowerPath('bootstrap','dist','css','bootstrap-theme.min.css')
      bowerPath('bootstrap','dist','css','pace-theme-flash.css')
      bowerPath('bootstrap','dist','css','font-awesome.css')
      bowerPath('bootstrap','dist','css','jquery.scrollbar.css')
      bowerPath('bootstrap','dist','css','select2.css')
      bowerPath('bootstrap','dist','css','switchery.min.css')
      bowerPath('bootstrap','dist','css','pages-icons.css')
      bowerPath('bootstrap','dist','css','pages.css')
      bowerPath('bootstrap','dist','css','windows.chrome.fix.css')
    ], 'public/css/vendor.css'

    mix.sass 'app.scss'

    mix.scripts [
      bowerPath('jquery','dist', 'jquery.min.js')
      bowerPath('bootstrap','dist','js','bootstrap.min.js')
      bowerPath('bootstrap','dist','js','pace.min.js')
      bowerPath('bootstrap','dist','js','jquery-1.11.1.min.js')
      bowerPath('bootstrap','dist','js','modernizr.custom.js')
      bowerPath('bootstrap','dist','js','jquery-ui.min.js')
      bowerPath('bootstrap','dist','js','jquery-easy.js')
      bowerPath('bootstrap','dist','js','jquery.unveil.min.js')
      bowerPath('bootstrap','dist','js','jquery.bez.min.js')
      bowerPath('bootstrap','dist','js','jquery.ioslist.min.js')
      bowerPath('bootstrap','dist','js','jquery.actual.min.js')
      bowerPath('bootstrap','dist','js','jquery.scrollbar.min.js')
      bowerPath('bootstrap','dist','js','select2.min.js')
      bowerPath('bootstrap','dist','js','classie.js')
      bowerPath('bootstrap','dist','js','switchery.min.js')
      bowerPath('bootstrap','dist','js','pages.min.js')
      bowerPath('bootstrap','dist','js','scripts.js')
      bowerPath('bootstrap','dist','js','jquery.validate.min.js')
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

