@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Contactos',
'navbarClass'=>'navbar-transparent',
'activePage'=>'contactos',
])
@section('content')
@include('includes.spinner')

<div class="content pt-0">

    <div class="container-fluid">

        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">

                        <h4 class="card-title">Agregar nuevo contacto</h4>
                    </div>
                    <div class="card-body ">
                        <form id="create-post-admin" action="{{ route('correo.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-row ">
                                <div class="form-group col-12 col-md-4">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label class="bmd-label-floating">Area</label>
                                    <input type="text" class="form-control" name="area" value="{{ old('area') }}">
                                    @error('area')
                                    <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label class="bmd-label-floating">Comentarios</label>
                                    <input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                                    @error('comment')
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