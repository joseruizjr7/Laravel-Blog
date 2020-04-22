<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        @if (request()->is('admin'))
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i>Inicio</i></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Inicio</li>
                </ol>
            </div><!-- /.col -->
        @endif
        @if (request()->is('admin/posts'))
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i>Publicaciones</i></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Publicaciones</li>
                </ol>
            </div><!-- /.col -->
        @endif
        @if (request()->is('admin/posts/create'))
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i>Nueva Publicación</i></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Nueva Publicación</li>
                </ol>
            </div><!-- /.col -->
        @endif
        @if (Route::currentRouteName() == 'admin.posts.edit')
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i>Editar Publicación</i></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Publicaciones</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div><!-- /.col -->
        @endif
        @if (Route::currentRouteName() == 'admin.users.show')
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i>Perfíl</i></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active">{{ $user->name }}</li>
                </ol>
            </div><!-- /.col -->
        @endif
        @if (Route::currentRouteName() == 'admin.users.edit')
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i>Editar Usuario</i></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.users.show', ['user' => $user]) }}">{{ $user->name }}</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div><!-- /.col -->
        @endif
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>