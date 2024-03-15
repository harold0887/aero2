@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Plantillas',
'navbarClass'=>'navbar-transparent',
'activePage'=>'plantillas',
])
@section('content')
@include('includes.spinner')

<div class="content pt-0">

    <div class="container-fluid">

        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">

                        <h4 class="card-title">Editar Plantilla - {{$plantilla->title}} </h4>
                    </div>
                    <div class="card-body ">
                        <form id="create-post-admin" action="{{ route('post.update', $plantilla->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf @method('PATCH')
                            <div class="form-row ">
                                <div class="form-group col-12 col-md-4">
                                    <label class="bmd-label-floating">Titulo</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') ?: $plantilla->title }}">
                                    @error('title')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label class="bmd-label-floating">Mensaje de despedida</label>
                                    <select class="form-control" name="salida" value="{{ old('salida') }}">
                                        <option value="" disabled selected>Selecciona...</option>
                                        @foreach($salidas as $item)
                                        <option value=" {{ $item->id }}" {{ $plantilla->salida->id == $item->id ? 'selected' : '' }} {{ old('salida') == $item->id ? 'selected' : '' }}>{{$item->salida}}</option>
                                        @endforeach
                                    </select>
                                    @error('salida')
                                    <small class=" text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>



                            </div>


                            <div class="form-row   mt-lg-5">
                                <div class="form-group col-md-12">
                                    <label for="information">Información</label>
                                    <textarea class="ckeditor form-control {{ $errors->has('information') ? ' is-invalid border-danger' : '' }}" name="information" rows="5" value="">{{ old('information') ?: $plantilla->message }}</textarea>
                                    @error('information')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>












                            <div class="col-sm-10 text-center mt-5">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>

    @endsection
    @include('includes.alert-error')