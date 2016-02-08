
	<ul class="nav navbar-nav">
        <li class="active"><a href="{!! url('/companies') !!}">Company <span class="sr-only">(current)</span></a></li>
        <li><a href="{!! url('/people') !!}">People</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Project <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{!! url('/project-categories') !!}">Project Category</a></li>
            <li><a href="{!! url('/projects') !!}">Project</a></li>
          </ul>
        </li>
      </ul>
