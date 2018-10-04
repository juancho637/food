<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/plugins/adminLTE/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">HEADER</li> -->

            <!-- Optionally, you can add icons to the links -->
            <li {{ request()->is('admin/home') ? 'class=active' : '' }}>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            @can('branches.index')
            <li {{ request()->is('admin/branches*') ? 'class=active' : '' }}>
                <a href="{{ route('branches.index') }}">
                    <i class="fa fa-building"></i>
                    <span>Sucursales</span>
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
            {{-- <li class="treeview {{ request()->is('finances*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span>Finanzas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('finances/invoices*') ? 'class=active' : '' }}>
                        <a href="{{ route('invoices.index') }}">Facturas</a>
                    </li>
                    <li {{ request()->is('finances/deposits*') ? 'class=active' : '' }}>
                        <a href="{{ route('deposits.index') }}">Depositos</a>
                    </li>
                    <li {{ request()->is('finances/quotations*') ? 'class=active' : '' }}>
                        <a href="{{ route('quotations.index') }}">Cotizaciones</a>
                    </li>
                    <li {{ request()->is('finances/credits*') ? 'class=active' : '' }}>
                        <a href="{{ route('credits.index') }}">Pago de créditos</a>
                    </li>
                    <li {{ request()->is('finances/expenses*') ? 'class=active' : '' }}>
                        <a href="{{ route('expenses.index') }}">Gastos/Egresos</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="treeview {{ request()->is('reports*') ? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Informes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li {{ request()->is('admin/clients') ? 'class=active' : '' }}>
                  <a href="{{ route('clients.index') }}">Clientes</a>
                </li>
                <li {{ request()->is('admin/products') ? 'class=active' : '' }}>
                  <a href="{{ route('products.index') }}">Productos</a>
                </li>
              </ul>
            </li> --}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>