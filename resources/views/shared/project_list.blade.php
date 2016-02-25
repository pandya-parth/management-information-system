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
        <span class="icon-thumbnail bg-success"><i class="pg-home"></i></span>
      </li>
      <li>
        <ul>
          @foreach($project_categories as $project_cat)
            <span><i class="fa fa-book"></i><a style="padding:0 0 0 20px;" >{!! $project_cat->name !!}</a></br></span>
                    

                    @foreach($projects as $project)
                      
                      @if($project->category_id == $project_cat->id)
                      
                        <span style="padding:0 0 0 20px;" ><a style="padding:0 0 0 20px;" >{!! $project->name !!}</a></span></br>
                      
                      @endif
                      
                    @endforeach
            
          @endforeach
        </ul>
      </li>     
       </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>