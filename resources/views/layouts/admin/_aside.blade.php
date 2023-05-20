<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">

        <img src={{asset('dashboard/img/user2-160x160.jpg')}} alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Ahmed Salama</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">

                <img src={{ asset('dashboard/img/user2-160x160.jpg') }} class="img-circle elevation-2 avatar-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->roles[0]->name }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('site.DASHBOARD')}}
                        </p>
                    </a>
                </li>





                {{-- Companies --}}
                @if (Auth::user()->hasPermission('companies-read'))
                    <li class="nav-item">
                        <a href="{{ route('admin.companies.index') }}"
                            class="nav-link   {{ Route::is('admin.companies.*') ? 'active' : '' }}">
                            <i class="fas  nav-icon fa-building"></i>
                            <p>
                                {{ __('site.COMPANIES') }}
                            </p>
                        </a>
                    </li>
                @endif
                {{-- Companies --}}



                {{-- employees --}}
                @if (Auth::user()->hasPermission('employees-read'))
                    <li class="nav-item">
                        <a href="{{ route('admin.employees.index') }}"
                            class="nav-link   {{ Route::is('admin.employees.*') ? 'active' : '' }}">
                            <i class="fas  nav-icon fa-building"></i>
                            <p>
                                {{ __('site.EMPLOYEES') }}
                            </p>
                        </a>
                    </li>
                @endif
                {{-- employees --}}




































            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
