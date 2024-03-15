@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Plantillas',
'navbarClass'=>'navbar-transparent',
'activePage'=>'internal',
])
@section('content')
@include('includes.spinner')

<div class="content pt-0">

    <div class="container-fluid">

        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">

                        <h4 class="card-title">Agregar Plantilla contacto interno</h4>
                    </div>
                    <div class="card-body ">
                        <form id="create-post-admin" action="{{ route('internal.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-row ">
                                <div class="form-group col-12 col-md-4">
                                    <label class="bmd-label-floating">Titulo</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-2">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                                    @error('nombre')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-2">
                                    <label class="bmd-label-floating">Email (opcional)</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label class="bmd-label-floating">Notas (opcional)</label>
                                    <input type="text" class="form-control" name="nota" value="{{ old('nota') }}">
                                    @error('nota')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                               
                            </div>


                            <div class="form-row   mt-lg-5">
                                <div class="form-group col-md-12">
                                    <label for="information">Mensaje</label>
                                    <textarea class="ckeditor form-control {{ $errors->has('information') ? ' is-invalid border-danger' : '' }}" name="information" rows="5" value="">{{ old('information') }}</textarea>
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