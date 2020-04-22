@extends('admin.layout')

@section('content')
    <div class="container-fluid justify-content-center">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Datos del Usuario</div>
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input class="form-control" name="name" value="{{ old('name', $user->name) }}" id="name" type="text">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" name="email" value="{{ old('email', $user->email) }}" id="email" type="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</span> </label>
                                <input class="form-control" name="password" id="password" type="password" placeholder="Ingrese la nueva contraseña">
                                <span class="help-block text-muted">Dejar en blanco para no cambiar la contraseña.</span>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Repite la Contraseña:</label>
                                <input class="form-control" name="password_confirmation" id="password" type="password" placeholder="Confirma la contraseña">
                                <span class="help-block text-muted">Dejar en blanco para no cambiar la contraseña.</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Roles</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input class="form-check-input" value="{{ $role->id }}" type="radio" name="roles[]" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Actualizar Roles</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Permisos</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @foreach ($permissions as $permission)
                                    @php
                                        

                                        $permissionName = Str::title($permission->name, ' ');
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" value="{{ $permission->id }}" type="checkbox" name="permissions[]" {{ $user->permissions->contains($permission->id) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $permissionName }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Actualizar Permisos</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection