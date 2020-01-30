<header class="main-header">
    <!-- Logo -->
    @auth
    <a href="{{ url('/')}}" class="logo kepala">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa-book"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>KreMo</b></span>
    </a>
    @endauth
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top kepala">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>    
      <li class="nav-item dropdown" style="margin-left:87%;">
        @auth
        <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-brand" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        @endauth
        <br/>
        <br/>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" 
                           style="margin-left: 20px;">
              <i class="glyphicon glyphicon-log-out"></i>  <b>{{ __('Logout') }}</b>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
      </li>
    </nav>
  </header>

      @auth
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Data Master</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('admin/pembeli')}}"><i class="fa fa-circle-o"></i> Pembeli</a></li>
                  <li><a href="{{ url('admin/motor')}}"><i class="fa fa-circle-o"></i> Motor</a></li>
                </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      @endauth