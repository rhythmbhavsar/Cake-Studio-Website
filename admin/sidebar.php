<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- <!- Brand Logo  -->
  <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['admin']; ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">

          <a href="home.php" class="nav-link active">
            <p>
              Dashboard
            </p>
          </a>

          <a href="category1.php" class="nav-link active">
            <p>
              Category Master
            </p>
          </a>

          <a href="menu1.php" class="nav-link active">
            <p>
              Menu
            </p>
          </a>

          <a href="customer_registration1.php" class="nav-link active">
            <p>
              Customer Registration
            </p>
          </a>
          <a href="customer_view1.php" class="nav-link active">
            <p>
              Customer View
            </p>
          </a>
          <a href="view_order_details.php" class="nav-link active">
            <p>
              View Order
            </p>
          </a>
          <a href="cake_name.php" class="nav-link active">
            <p>
              Name on cake
            </p>
          </a>
          <a href="changepassword.php" class="nav-link active">
            <p>
              Change Password
            </p>
          </a>

          <a href="logout.php" class="nav-link active">
            <p>
              Log Out
            </p>
          </a>

        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>