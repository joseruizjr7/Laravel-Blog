@extends('admin.layout')

@section('content')
    <div class="container-fluid justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Datos del Usuario</div>
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input class="form-control" name="name" value="{{ old('name') }}" id="name" type="text">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" name="email" value="{{ old('email') }}" id="email" type="email">
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
            
        </div>
        
    </div>
@endsection