<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="{{(!empty(Auth::user()->image)) ?  URL::to('upload/user_images/'.Auth::user()->image) : URL::to('upload/default.jpg')}}" class="img-circle" >
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
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
        <li class="active treeview">
        <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>

        </li>
         @if(Auth::User()->role==1)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('users.view')}}"><i class="fa fa-circle-o"></i> View User</a></li>
          </ul>
        </li>

        <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i>
                  <span>Buyer Tender</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right"></span>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('tender.index')}}"><i class="fa fa-circle-o"></i>Create Tender </a></li>
                  <li><a href="{{route('buyer.order')}}"><i class="fa fa-circle-o"></i>supplier Request Tender Details </a></li>
                </ul>
              </li>
         @endif

           @if(Auth::User()->role==3   )
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i>
                  <span> Tender Details</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right"></span>
                  </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{route('tender.details')}}"><i class="fa fa-circle-o"></i> Tender Details</a></li>
                </ul>
              </li>
           @endif

        <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i>
              <span>Manage Profile</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right"></span>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('profiles.view')}}"><i class="fa fa-circle-o"></i> Your Profile</a></li>
              <li><a href="{{route('password.view')}}"><i class="fa fa-circle-o"></i> Change Password</a></li>
            </ul>
          </li>
        <li>

            {{-- <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i>
                  <span>Manage Suppliers</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right"></span>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('suppliers.view')}}"><i class="fa fa-circle-o"></i>View Supplier</a></li>
                </ul>
              </li> --}}


            <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i>
                  <span>Manage Product</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right"></span>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('products.add')}}"><i class="fa fa-circle-o"></i>Add Product</a></li>
                </ul>
              </li>











      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
