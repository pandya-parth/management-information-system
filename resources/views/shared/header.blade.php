<div class="header ">
  <!-- START MOBILE CONTROLS -->
  <!-- LEFT SIDE -->
  <div class="pull-left full-height visible-sm visible-xs">
    <!-- START ACTION BAR -->
    <div class="sm-action-bar">
      <a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
        <span class="icon-set menu-hambuger"></span>
      </a>
    </div>
    <!-- END ACTION BAR -->
  </div>
  <!-- RIGHT SIDE -->
  <div class="pull-right full-height visible-sm visible-xs">
    <!-- START ACTION BAR -->
    <div class="sm-action-bar">
      <a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
        <span class="icon-set menu-hambuger-plus"></span>
      </a>
    </div>
    <!-- END ACTION BAR -->
  </div>
  <!-- END MOBILE CONTROLS -->
  <div class=" pull-left sm-table">
    <div class="header-inner">
      <div class="brand inline" style="padding-left:25px;">
        <img src="{!! asset('img/logo.png')!!}" alt="logo" data-src="{!! asset('img/logo.png')!!}" data-src-retina="{!! asset('img/logo_2x.png')!!}" width="150" >
      </div>
    </div>
  </div>
  <ul class="nav navbar-nav">
    <li class="active"><a href="{!! url('/') !!}">Home</a></li>
    <li><a href="{!! url('companies') !!}">Company</a></li>
    <li><a href="{!! url('departments') !!}">Department</a></li>
    <li><a href="{!! url('designations') !!}">Designation</a></li>
    <li><a href="{!! url('industries') !!}">Industry</a></li>
    <li><a href="{!! url('people') !!}">People</a></li>
    <li><a href="{!! url('projects') !!}">Project</a></li>
    <li><a href="{!! url('/project-categories') !!}">PC</a></li>
    <li><a href="{!! url('/task-categories') !!}">TC</a></li>
  </ul>
   <div class=" pull-right">
          <div class="header-inner">
            <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a>
          </div>
        </div>
  <div class=" pull-right">
    <!-- START User Info-->
    <div class="visible-lg visible-md m-t-10">
      <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
        @if(Auth::check())
        <span class="semi-bold">@if(Auth::user()->people->fname==null)
           {!! Auth::user()->email!!}
          @else
           {!! ucwords( Auth::user()->people->fname." ".Auth::user()->people->lname)!!}
        @endif
        </span>
        @endif
      
      </div>
      <div class="dropdown pull-right">
        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="thumbnail-wrapper d32 circular inline m-t-5">
            @if(Auth::check())
              @if(Auth::user()->people->photo!=null)
                <img src="{!! url('uploads/people-thumb/', Auth::user()->people->photo)!!}" width="32" height="32">
              @else
                <img src="{!! url('img/noPhoto.png')!!}" width="32" height="32">
              @endif
            @endif
          </span>
        </button>
        <ul class="dropdown-menu profile-dropdown" role="menu">
          <li><a href="#"><i class="pg-settings_small"></i> Settings</a>
          </li>
          <li><a href="{!! url('/change-password')!!}"><i class="fa-key"></i> Change Password</a>
          </li>
          <li><a href="{!! url('/change-profile') !!}"><i class="pg-settings_small"></i> Change Profile</a>
          </li>
          <li><a href="#"><i class="pg-signals"></i> Help</a>
          </li>
          <li class="bg-master-lighter">
            <a href="{!! url('logout') !!}" class="clearfix">
              <span class="pull-left">Logout</span>
              <span class="pull-right"><i class="pg-power"></i></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- END User Info-->
  </div>
</div>

@include('shared.right_sidebar')