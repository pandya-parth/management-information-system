  <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-40"><img src="img/demo/social_app.svg" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-10"><img src="img/demo/email_app.svg" alt="socail">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-40"><img src="img/demo/calendar_app.svg" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-10"><img src="img/demo/add_more.svg" alt="socail">
            </a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="img/logo_white.png" alt="logo" class="brand" data-src="img/logo_white.png" data-src-retina="img/logo_white_2x.png" width="100" height="30">
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
          
          <li class="">
            <a href="javascript:;"><span class="title">Project</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail">PR</span>
            <ul class="sub-menu">

              <li class="">
                <a href="{!! url('project-categories') !!}">Project Category</a>
                <span class="icon-thumbnail">PC</span>
              </li>
              <li class="">
                <a href="{!! url('projects') !!}">Projects</a>
                <span class="icon-thumbnail">P</span>
              </li>
              <li class="">
                <a href="{!! url('milestones') !!}">Milestones</a>
                <span class="icon-thumbnail ">M</span>
              </li>
            </ul>
          </li>

          <li class="">
            <a href="javascript:;"><span class="title">Task</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail">T</span>
            <ul class="sub-menu">

              <li class="">
                <a href="{!! url('task-categories') !!}">Task Category</a>
                <span class="icon-thumbnail">TC</span>
              </li>
              <li class="">
                <a href="{!! url('tasks') !!}">Tasks</a>
                <span class="icon-thumbnail">T</span>
              </li>
              
            </ul>
          </li>

          <li class="">
            <a href="{!! url('companies') !!}"><span class="title">Company</span></a>
            <span class="icon-thumbnail ">C</span>
          </li>
          <li class="">
            <a href="{!! url('people') !!}"><span class="title">People</span></a>
            <span class="icon-thumbnail ">P</span>
          </li>

          
          
          
          
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>