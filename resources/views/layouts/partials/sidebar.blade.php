<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                <i class="nav-icon fas fa-solid fa-desktop"></i>
              <p>
                Dashboard
                <span class="right badge badge-warning">dashboard</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/users') }}" class="nav-link @yield('user')">
                <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <span class="right badge badge-warning">user</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link @yield('setting')">
                <i class="nav-icon fas fa-solid fa-snowflake"></i>
              <p>
                Site Settings
                <span class="right badge badge-warning">setting</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('sliders.index') }}" class="nav-link @yield('slider')">
                <i class="nav-icon fas fa-regular fa-image"></i>
              <p>
                Slider
                <span class="right badge badge-warning">slider</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link @yield('category')">
              <i class="nav-icon fas fa-solid fa-cart-plus"></i>
              <p>
                Category
                <span class="right badge badge-warning">category</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('brands.index') }}" class="nav-link @yield('brand')">
                <i class="nav-icon fas fa-solid fa-snowflake"></i>
              <p>
                Brands
                <span class="right badge badge-warning">brands</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('colors.index') }}" class="nav-link @yield('color')">
              <i class="nav-icon fas fa-solid fa-palette"></i>
              <p>
                Color
                <span class="right badge badge-warning">color</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link @yield('product')">
                <i class="nav-icon fas fa-solid fa-snowflake"></i>
              <p>
                Product
                <span class="right badge badge-warning">product</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('orders.index') }}" class="nav-link @yield('order')">
                <i class="nav-icon fas fa-solid fa-snowflake"></i>
              <p>
                Order
                <span class="right badge badge-warning">order</span>
              </p>
            </a>
          </li>





          <li class="nav-item menu-open">
            <a href="{{ route('logout') }}" class="nav-link "
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout
                <span class="right badge badge-warning">logout</span>
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>


        </ul>
      </nav>
    </div>
  </aside>
