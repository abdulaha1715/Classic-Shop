<!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html">{{ config('app.name') }}</a>
          <a class="sidebar-brand brand-logo-mini" href="index.html">{{ config('app.name') }}</a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin-dashboard') }}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('all-users') }}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Chef</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('chefs') }}">All Chef</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('create-chef') }}">Create Chef</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-food" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Food Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-food">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('food-menu') }}">All Foods</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('create-food') }}">Create Foods</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Items</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Foods</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Chefs</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Reservations</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('view-reservation') }}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">All Reservation</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('view-order') }}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">All Orders</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Tables</span>
            </a>
          </li>
        </ul>
      </nav>
