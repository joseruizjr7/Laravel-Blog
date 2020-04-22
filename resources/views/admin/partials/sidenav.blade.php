<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/admin/img/avatar_1.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        @if (auth()->user()->roles->first()->name == 'Administrador')
            <small class="badge badge-danger"><i class="fas fa-crown"></i> {{ auth()->user()->roles->first()->name }}</small>
        @elseif (auth()->user()->roles->first()->name == 'Analista')
            <small class="badge badge-warning"><i class="far fa-eye"></i> {{ auth()->user()->roles->first()->name }}</small>
        @elseif (auth()->user()->roles->first()->name == 'Escritor')
            <small class="badge badge-info"><i class="far fa-eye"></i> {{ auth()->user()->roles->first()->name }}</small>
        @else
            <small class="badge badge-success"><i class="far fa-eye"></i> {{ auth()->user()->roles->first()->name }}</small>
        @endif
        
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('blog') }}" class="nav-link">
                <i class="nav-icon fas fa-newspaper" aria-hidden="true"></i>
                <p>Ir al Blog</p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Inicio</p>
            </a>
        </li> --}}
        <li class="nav-item has-treeview {{ request()->is('admin/posts') ? 'menu-open' : '' }} {{ request()->is('admin/posts/create') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('admin/posts') ? 'active' : '' }} {{ request()->is('admin/posts/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Publicaciones
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->is('admin/posts') ? 'active' : '' }}">
                      <i class="fas fa-table nav-icon"></i>
                      <p>Tabla de Publicaciones</p>
                  </a>
              </li>
            <li class="nav-item">
              <a data-toggle="modal" data-target="#exampleModalCenter" href="#" class="nav-link">
                <i class="fa fa-plus nav-icon"></i>
                <p>Crear Publicación</p>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item has-treeview {{ request()->is('admin/users') ? 'menu-open' : '' }} {{ request()->is('admin/users/create') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }} {{ request()->is('admin/users/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuarios
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                        <i class="fas fa-table nav-icon"></i>
                        <p>Tabla de Usuarios</p>
                    </a>
                </li>
              @if (auth()->user()->hasRole('Administrador') || auth()->user()->hasPermissionTo('crear_usuarios'))
                    <li class="nav-item">
                        <a href="{{ route('admin.users.create') }}" class="nav-link {{ request()->is('admin/users/create') ? 'active' : '' }}">
                            <i class="fa fa-user-plus nav-icon"></i>
                            <p>Crear Usuario</p>
                        </a>
                    </li>
              @endif
            
            
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->