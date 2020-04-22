@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/admin/img/avatar_1.png') }}" alt="User profile picture">
                    </div>
  
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
  
                    <p class="text-muted text-center">{{ $user->roles->first()->name }}</p>
  
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            
                            <b>Publicaciones</b> <a class="float-right">{{ $user->posts->count() }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Roles</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>
                    @php
                        $edit_url = 'admin/users/'.$user->id.'/edit';
                    @endphp
                    <a href="{{ url($edit_url) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <div class="col-md-9">
            @foreach ($user->posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>
                        <a href="{{ route('admin.posts.show', $post) }}" class=""><b>Ver Publicación</b></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection