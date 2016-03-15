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
    <img src="{!! asset('img/logo_white.png')!!}" alt="logo" class="brand" data-src="{!! asset('img/logo_white.png')!!}" data-src-retina="{!! asset('img/logo_white_2x.png')!!}" width="78" height="22">
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
        <span class="icon-thumbnail bg-success dashboard-icon"><i class="icon-dashboard"></i></span>
      </li>
      <li>
        <div class="view company_sidebar">
          <div  class="list-view boreded no-top-border">
            <div class="list-view-group-container">
              <ul>
                @foreach($industries as $industry)
                <!-- BEGIN Categories List  !-->
                <li class="chat-user categories_p clearfix">
                  <a data-view-animation="push-parrallax" data-navigate="view" class="" href="#">
                    <p class="p-l-10 col-xs-height col-middle col-xs-12">
                      <span>{!! strtoupper($industry->name) !!}</span>
                      <span class="pill">{!! DB::table('companies')
            ->where('industry_id', $industry->id)
            ->groupBy('industry_id')
            ->count()!!}</span>
                    </p>
                  </a>
                  <i class="fa fa-angle-down fs-16 navtogg"></i>  
                  <ul>
                    @foreach($companies as $company)

              @if($company->industry_id == $industry->id)
                    <li><a href="{!! url('/companies',$company->id)!!}" >{!! $company->name !!}</a></li>
                    @endif

              @endforeach
                  </ul>
                </li>
                @endforeach
                <!-- END Categories List  !-->
              </ul>
            </div>
          </div>
        </div>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>

  
    <!-- END SIDEBAR MENU -->
  </nav>