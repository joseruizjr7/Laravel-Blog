@extends('admin.layout')

@section('content')
    <div class="container justify-content-center">
        <div class="col">
            <div class="card card-secondary shadow">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                
                                    <div class="form-group">
                                        <label for="title" class="">Título:</label>
                                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Ingrese el título del Post...">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title', ':message') }}
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="excerpt" class="">Extracto:</label>
                                        <textarea placeholder="Ingrese un breve extracto del Post..." class="form-control" name="excerpt" id="excerpt" cols="" rows="1"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="body" class="">Contenido:</label>
                                        <textarea class="textarea {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" rows="10" placeholder="Ingrese el contenido del Post aqui..." style="width: 100%; height: 100%; font-size: 14px; line-height: 18px; border: 1px solid #0000ff; padding: 10px;"></textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('body', ':message') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Publicación:</label>
                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input name="published_at" placeholder="dd-mm-yyyy" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Categoría:</label>
                                        <select name="category_id" class="custom-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                            <option>Selecione una categoría</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('category_id', ':message') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Etiquetas:</label>
                                        <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Selecione las etiquetas..." style="width: 100%;">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input value="1" name="is_published" type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Publicar</label>
                                          </div>
                                    </div>-->
                                </div>
                                
                                <!--<div class="col-md-6">
                                     Date dd/mm/yyyy 
                                    <div class="form-group">
                                        <label>Fecha de Publicación:</label>
                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input name="published_at" placeholder="dd/mm/yyyy" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                        </div>
                                    </div>
                                </div>-->

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
