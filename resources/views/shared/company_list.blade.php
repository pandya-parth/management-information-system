<nav class="page-sidebar" data-pages="sidebar">
  <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
  <div class="sidebar-overlay-slide from-top" id="appMenu">
    <div class="row">
      <div class="col-xs-6 no-padding">
        <a href="#" class="p-l-40"><img src="{!! asset('img/demo/social_app.svg')!!}" alt="socail">
        </a>
      </div>
      <div class="col-xs-6 no-padding">
        <a href="#" class="p-l-10"><img src="{!! asset('img/demo/email_app.svg')!!}" alt="socail">
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 m-t-20 no-padding">
        <a href="#" class="p-l-40"><img src="{!! asset('img/demo/calendar_app.svg')!!}" alt="socail">
        </a>
      </div>
      <div class="col-xs-6 m-t-20 no-padding">
        <a href="#" class="p-l-10"><img src="{!! asset('img/demo/add_more.svg')!!}" alt="socail">
        </a>
      </div>
    </div>
  </div>
  <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
  <!-- BEGIN SIDEBAR MENU HEADER-->
  <div class="sidebar-header">
    <div class="logo">
    <img src="{!! asset('img/logo_white.png')!!}" alt="logo" class="brand" data-src="{!! asset('img/logo_white.png')!!}" data-src-retina="{!! asset('img/logo_white_2x.png')!!}">
  </div>
    <div class="sidebar-header-controls">
      <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
      </button>
      <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
      </button>
    </div>
  </div>
  <!-- END SIDEBAR MENU HEADER-->
  <!-- START SIDEBAR MENU -->
  <div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
      <li class="m-t-30 ">
        <a href="{!! url('/') !!}" class="detailed">
          <span class="title">Dashboard</span>
        </a>
        <span class="icon-thumbnail bg-success"><i class="pg-home"></i></span>
      </li>
      <li>
          <div class="view company_sidebar">
              <div  class="list-view boreded no-top-border">
                <div class="list-view-group-container">
                 
                  <ul>
                    <!-- BEGIN Categories List  !-->
                    <li class="chat-user categories_p clearfix">

                      <a data-view-animation="push-parrallax" data-navigate="view" class="" href="#">
                      <i class="fa fa-angle-down fs-16 dropdown"></i>
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">A</span>
                          <span class="pill">1111</span>
                          </p>
                      </a>
                    <ul class="log-indropdown">
                      <li><a href="#" class="text-master">A1</a></li>
                      <li><a href="#" class="text-master">A2</a></li>
                      <li><a href="#" class="text-master">A3</a></li>
                      <li><a href="#" class="text-master">A4</a></li>
                    </ul>
                    </li>
                    <li class="chat-user categories_p clearfix">
                      <a data-view-animation="push-parrallax" data-navigate="view" class="" href="#">
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">B</span>
                          <span class="pill">2222</span>
                          </p>
                      </a>
                    </li>
                    <li class="chat-user categories_p clearfix">
                      <a data-view-animation="push-parrallax" data-navigate="view" class="" href="#">
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">C</span>
                          <span class="pill">3333</span>
                          </p>
                      </a>
                    </li>
                    <li class="chat-user categories_p clearfix">
                      <a data-view-animation="push-parrallax" data-navigate="view" class="" href="#">
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">D</span>
                          <span class="pill">4444</span>
                          </p>
                      </a>
                    </li>
                    <li class="chat-user categories_p clearfix">
                      <a data-view-animation="push-parrallax" data-navigate="view" class="" href="#">
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">E</span>
                          <span class="pill">5555</span>
                          </p>
                      </a>
                    </li>
                    <li class="chat-user categories_p clearfix">
                      <a data-view-animation="push-parrallax" data-navigate="view" class="" href="#">
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">F</span>
                          <span class="pill">6666</span>
                          </p>
                      </a>
                    </li>
                    <!-- END Categories List  !-->
                  </ul>
                </div>
                
              </div>
            </div>



       {{-- <ul>
          @foreach($companies as $company)
          <span><i class="fa fa-book"></i><a style="padding:0 0 0 20px;" >{!! $company->name !!}</a> ({!! DB::table('projects')
            ->where('client_id', $company->id)
            ->groupBy('client_id')
            ->count()!!})</br></span>
            <ol>
              @foreach($projects as $project)
              @if($project->client_id == $company->id)
              <li>
                <span><a href="{!! url('/projects',$project->id)!!}">{!! $project->name !!}</a></span></br>
              </li>
              @endif
              @endforeach
            </ol>
            @endforeach
          </ul>
          --}}
        </li>





      </ul>
      <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
  </nav>