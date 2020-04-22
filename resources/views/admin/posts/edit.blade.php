@extends('admin.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="col">
            @if ($errors->any())
                <ul class="list-group">
                    @foreach ($errors as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
            @endif
            <div class="card card-secondary shadow">
                <form action="{{ route('admin.posts.update', $post) }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                
                                    <div class="form-group">
                                        <label for="title" class="">Título:{{ $post->id }}</label>
                                        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Ingrese el título del Post...">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title', ':message') }}
                                        </div>
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Categoría:</label>
                                        <select name="category_id" class="custom-select select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                            <option>Selecione una categoría</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- {!! $errors->first('category_id' '<span class="help-block">:message</span>') !!} --}}
                                        <div class="invalid-feedback">
                                            {{ $errors->first('category_id', ':message') }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">

                                    @if ( auth()->user()->hasRole(['Administrador', 'Analista']) || auth()->user()->hasPermissionTo('publicar_posts') )
                                        <div class="form-group">
                                            @if ($post->published_at == null)
                                                <label>Fecha de Publicación:</label>
                                            @else
                                                <label>Fecha de Publicación: {{ $post->published_at->isoFormat('DD-MM-YYYY') }}</label>
                                            @endif
                                            
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                    @if ($post->published_at == null)
                                                        <input name="published_at" value="{{ old('published_at') }}" placeholder="dd-mm-yyyy" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                                    @else
                                                        <input name="published_at" value="{{ old('published_at', $post->published_at->isoFormat('DD-MM-YYYY') ) }}" placeholder="dd-mm-yyyy" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                                    @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            @if ($post->published_at == null)
                                                <label>Fecha de Publicación:</label>
                                            @else
                                                <label>Fecha de Publicación: {{ $post->published_at->isoFormat('DD-MM-YYYY') }}</label>
                                            @endif
                                            
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                    @if ($post->published_at == null)
                                                        <input name="published_at" value="{{ old('published_at') }}" placeholder="dd-mm-yyyy" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask disabled>
                                                    @else
                                                        <input name="published_at" value="{{ old('published_at', $post->published_at->isoFormat('DD-MM-YYYY') ) }}" placeholder="dd-mm-yyyy" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask disabled>
                                                    @endif
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label>Etiquetas:</label>
                                        <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Selecione las etiquetas..." style="width: 100%;">
                                            @foreach ($tags as $tag)
                                                <option {{ collect(old('tag_id', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- {!! $errors->first('tags' '<span class="help-block">:message</span>') !!} --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="excerpt" class="">Extracto:</label>
                                        <textarea placeholder="Ingrese un breve extracto del Post..." class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" name="excerpt" id="excerpt" cols="" rows="1">{{ old('excerpt', $post->excerpt) }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('excerpt', ':message') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="body" class=" {{ $errors->has('body') ? 'text-danger' : '' }}">
                                            Contenido: {{ $errors->first('body', ':message') }}
                                        </label>
                                        <textarea id="ckeditor" {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body">{{ old('body', $post->body) }}</textarea>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection