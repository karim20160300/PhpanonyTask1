  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      @include('admin.layouts.menu')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/')}}/design/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->guard('admin')->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

                <li>
          <a href="">
            <i class="fa fa-dashboard"> Dashboard</i> <span></span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
                <li>
          <a href="{{ url('admin/setting') }}">
            <i class="fa fa-dashboard"> Setting</i> <span></span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-dashboard"> Categories</i> <span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('admin/showallcats') }}"><i class="fa fa-users"> Show all categorise</i></a></li>
            <li class="active"><a href="{{ url('admin/addnewcat') }}"><i class="fa fa-users"> Add category</i></a></li>

          </ul>          
        </li>
               <li class="treeview">
          <a href="#">
            <i class="fa fa-users"> News</i> <span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href=""><i class="fa fa-users"> Show all news</i></a></li>
            <li class="active"><a href=""><i class="fa fa-users"> Add news</i></a></li>

          </ul>
        </li>
 
            <li>
          <a href="{{ url('admin/logout') }}">
            <i class="fa fa-sign-out" aria-hidden= "true"> LogOut</i> <span></span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
                    <li>
          <a href="">
             <span></span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
                    <li>
          <a href="">
            <span></span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
                    <li>
          <a href="">
            <span></span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
                            <li>
          <a href="">
            <span></span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
                            <li>
          <a href="">
            <span></span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

                           <li>
          <a href="">
            <span>Last LogIn: {{ auth()->guard('admin')->user()->lastlogin }}</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>