<aside style="background:#0069d9!important;" class="main-sidebar elevation-4">
    <!-- Brand Logo -->
  <!-- <a href="index3.html" class="brand-link">
      <img src="{{asset('/')}}img/logowhite.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <div style="color:#fff;font-size:16px;font-weight:700;" class="text-center font-weight-light white">Admin</div>
    </a>-->
   <!-- <div style="display: flex; justify-content: center;"><img src="{{asset('/')}}img/.png" width="100px" alt="LOGO" height="100%" ></img></div>-->
    <!--    <div style="color:#fff;font-size:16px;font-weight:700;" class="text-center font-weight-light white"><b>Admin</b></div>-->
    <br>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div style="background:#f9f9f9;" class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon fa-solid fa-paw"></i>
              <p>
                Satwa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/satwa" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Satwa Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/satwamutasi" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Satwa Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/satwamati" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Satwa Kematian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/mastersatwa" class="nav-link">
                  <i class="fa-solid fa-database nav-icon"></i>
                  <p>Master Satwa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/kandang" class="nav-link">
              <i class="nav-icon fa-solid fa-door-closed"></i>
              <p>
              Kandang 
              </p>
            </a>
          </li>-->
         <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon fa-solid fa-door-closed"></i>
              <p>
                Kandang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/satwa" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Satwa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/satwa" class="nav-link">
                  <i class="fa-solid fa-database nav-icon"></i>
                  <p>Master Satwa</p>
                </a>
              </li>
            </ul>
          </li>-->
         
         <!-- <li class="nav-item">
            <a href="{{ url('zona') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-location-dot"> </i>
              <p>
                Zona 
              </p>
            </a>
          </li>-->
        

          <!--@hasrole('super-admin')
          <li class="nav-item">
            <a href="{{ url('zona') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-location-dot"> </i>
              <p>
                Zona 
              </p>
            </a>
          </li>
          @endhasrole-->
          <!--<li class="nav-item">
            <a href="{{ url('keeper') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>
                Keeper 
              </p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="/transaksi" class="nav-link">
              <i class=" nav-icon fa-sharp fa-solid fa-cart-shopping"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/barang" class="nav-link">
              <i class="nav-icon fa-solid fa-box"></i>
              <p>
                Barang 
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="/category" class="nav-link">
              <i class="nav-icon fa-solid fa-list"></i>
              <p>
               Category
              </p>
            </a>
          </li>

          <!--<li class="nav-item">
            <a href="index.html" class="nav-link">
              <i class=" nav-icon fa-solid fa-gear"></i>
              <p>
                Settings 
              </p>
            </a>
          </li>-->
          @hasrole('superadmin')
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class=" nav-icon fa-solid fa-users"></i>
              <p>
                Pengguna 
              </p>
            </a>
          </li>
          @endhasrole
         

          <li class="nav-item">
            <a href="/logout" class="nav-link"> 
              <i class="nav-icon fa-solid fa-right-from-bracket"></i>
              <p>
                Logout 
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>