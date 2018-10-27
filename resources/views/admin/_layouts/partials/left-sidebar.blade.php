<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/plugins/adminLTE/img/user8-128x128.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">HEADER</li> -->

            <!-- Optionally, you can add icons to the links -->
            <li {{ request()->is('admin') ? 'class=active' : '' }}>
                <a href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Inicio</span>
                </a>
            </li>
            @can('companies.index')
                <li {{ request()->is('admin/companies*') ? 'class=active' : '' }}>
                    <a href="{{ route('companies.index') }}">
                        <i class="fa fa-building"></i>
                        <span>Empresas</span>
                    </a>
                </li>
            @endcan
            @can('branches.index')
            <li {{ request()->is('admin/branches*') ? 'class=active' : '' }}>
                <a href="{{ route('branches.index') }}">
                    <i class="fa fa-home"></i>
                    <span>Sucursales</span>
                </a>
            </li>
            @endcan
            @can('reservations.index')
            <li {{ request()->is('admin/reservations*') ? 'class=active' : '' }}>
                <a href="{{ route('reservations.index') }}">
                    <i class="fa fa-book"></i>
                    <span>Reservaciones</span>
                </a>
            </li>
            @endcan
            @can('products.index')
            <li {{ request()->is('admin/products*') ? 'class=active' : '' }}>
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Productos</span>
                </a>
            </li>
            @endcan
            @can('users.index')
            <li {{ request()->is('admin/users*') ? 'class=active' : '' }}>
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            @endcan
            @can('roles.index')
            <li {{ request()->is('admin/roles*') ? 'class=active' : '' }}>
                <a href="{{ route('roles.index') }}">
                    <i class="fa fa-check"></i>
                    <span>Roles</span>
                </a>
            </li>
            @endcan
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>