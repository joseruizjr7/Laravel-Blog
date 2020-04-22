@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                        <div class="col-md-10">
                            <h2 class="h3">Tabla de Publicaciones</h2>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus nav-icon"></i> Crear Publicación</button>
                        </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Categoría</th>
                                <th>Etiquetas</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Publicación</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    @if ($post->user_id == null)
                                        <td class="text-danger">Sin Autor</td>
                                    @else
                                        <td><a href="{{ route('admin.users.show', $post->user->id) }}">{{ $post->user->name }}</a></td>
                                    @endif
                                    @if ($post->category == null)
                                        <td class="text-danger">Sin Categoría</td>
                                    @else
                                        <td>{{ $post->category->name }}</td>
                                    @endif
                                    <td>
                                        <ul class="list-inline">
                                            @foreach ($post->tags as $tag)
                                                <li class="list-inline-item">#{{ $tag->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    @if ($post->published_at != null)
                                        <td>{{ $post->published_at->diffForHumans() }}</td>
                                    @else
                                        <td class="text-danger">Sin Fecha <i class="fa fa-times" aria-hidden="true"></i></td>
                                    @endif
                                    
                                    @if ($post->published_at <= $now)
                                        @if ($post->published_at != null)
                                            @if ($post->category_id == null)
                                            <td class="text-danger">No Publicado <i class="fa fa-times" aria-hidden="true"></i></td>
                                            @else
                                            <td class="text-success">Publicado <i class="fa fa-check" aria-hidden="true"></i></td>
                                            @endif
                                        @else
                                            <td class="text-danger">No Publicado <i class="fa fa-times" aria-hidden="true"></i></td>
                                        @endif
                                    @else
                                        @if ($post->published_at > $now)
                                            <td class="text-primary">Por Publicarse <i class="fa fa-clock" aria-hidden="true"></i></td>
                                        @else
                                            <td class="text-danger">No Publicado <i class="fa fa-times" aria-hidden="true"></i></td>
                                        @endif
                                    @endif
                                    <td>
                                        @php
                                            $edit_url = 'admin/posts/' . $post->url . '/edit';
                                        @endphp
                                        <a href="{{ route('admin.posts.show', ['post' => $post]) }}" class="btn btn-primary btn-xs"><i class="fas fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{ url($edit_url) }}" class="btn btn-info btn-xs"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display: inline;">
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