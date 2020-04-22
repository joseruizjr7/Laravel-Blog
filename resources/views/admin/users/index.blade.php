@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                        <div class="col-md-10">
                            <h2 class="h3">Tabla de Usuarios</h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-block"><i class="fa fa-plus nav-icon"></i> Crear Usuario</a href="{{ route('admin.users.create') }}">
                        </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                                    <td>
                                        @php
                                            $edit_url = 'admin/users/'.$user->id.'/edit';
                                        @endphp
                                        <a href="{{ route('admin.users.show', ['user' => $user]) }}" class="btn btn-primary btn-xs"><i class="fas fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{ url($edit_url) }}" class="btn btn-info btn-xs"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
    </div>
@endsection