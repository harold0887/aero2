@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'New Case',
'navbarClass'=>'navbar-transparent',
'activePage'=>'casos',
])
@section('content')
@include('includes.spinner')

<div class="content">

    <div class="container-fluid">

        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">

                        <h4 class="card-title">Agregar nuevo caso</h4>
                    </div>
                    <div class="card-body ">
                        <form id="create-post-admin" action="{{ route('casos.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="form-row ">
                                        <div class="form-group col-12 col-md-3">
                                            <label class="bmd-label-floating">Número de caso</label>
                                            <input type="number" class="form-control {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case" value="{{ old('case') }}">
                                            @error('case')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 col-md-6">
                                            <label class="bmd-label-floating">URL</label>
                                            <input type="text" class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" name="url" value="{{ old('url') ?: 'http://127.0.0.1:8000/dashboard/casos/create' }}">
                                            @error('url')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-3">
                                            <label class="bmd-label-floating">Status</label>
                                            <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                                                <option value="" disabled selected>Selecciona...</option>
                                                @foreach($status as $item)

                                                <option value=" {{ $item->id }}" {{ old('status') == $item->id ? 'selected' : '' }}>
                                                    {{$item->status}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <small class=" text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-12">
                                            <label class="bmd-label-floating">Solicitud</label>
                                            <input type="text" class="form-control {{ $errors->has('solicitud') ? 'is-invalid' : '' }}" name="solicitud" value="{{ old('solicitud') }}" id="solicitud_create">
                                            @error('solicitud')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-md-12">
                                            <label for="solucion">Solucion</label>
                                            <textarea class=" form-control {{ $errors->has('solucion') ? 'is-invalid' : '' }}" name="solucion" value="" id="solucion_create">{{ old('solucion') }}</textarea>
                                            @error('solucion')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-md-12">
                                            <label for="nota">Notas (opcional)</label>
                                            <textarea class=" form-control {{ $errors->has('nota') ? 'is-invalid' : '' }}" name="nota" value="">{{ old('nota') }}</textarea>
                                            @error('nota')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 border rounded">
                                    <div class="fom-row">
                                        <div class="col-auto">
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('cuenta') ? 'is-invalid' : '' }}" type="checkbox" name="cuenta" value="1" {{ old('cuenta') == 1 ? 'checked' : '' }}>
                                                    <span>Cuenta</span>

                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('valor') ? 'is-invalid' : '' }}" type="checkbox" name="valor" value="1" {{ old('valor') == 1 ? 'checked' : '' }}>
                                                    <span>Valor del cliente</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('vuelo') ? 'is-invalid' : '' }}" type="checkbox" name="vuelo" value="1" {{ old('vuelo') == 1 ? 'checked' : '' }}>
                                                    <span>Datos de vuelo</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('tipificacion') ? 'is-invalid' : '' }}" type="checkbox" name="tipificacion" value="1" {{ old('tipificacion') == 1 ? 'checked' : '' }}>
                                                    <span>Tipificacion</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('soportes') ? 'is-invalid' : '' }}" type="checkbox" name="soportes" value="1" {{ old('soportes') == 1 ? 'checked' : '' }}>
                                                    <span>Soportes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('duplicado') ? 'is-invalid' : '' }}" type="checkbox" name="duplicado" value="1" {{ old('duplicado') == 1 ? 'checked' : '' }}>
                                                    <span>Revisar duplicados</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input" type="checkbox" name="compensación" value="1">
                                                    <span>Compensación</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input" type="checkbox" name="contingencia" value="1">
                                                    <span>Contingencia</span>
                                                </label>
                                            </div>
                                        </div>



                                    </div>

                                </div>

                            </div>






                            <div class="row">
                                <div class="col-12 text-center mt-5">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="reset" class="btn">Cancelar</button>
                                </div>
                                <div class="col-12">
                                    <span class="text-muted text-xxs d-block">
                                        {{$casosDay}} casos cerrados el día de hoy.
                                    </span>
                                </div>

                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
@endsection
@include('includes.alert-error')
@push('js')
<script>
    $("#solicitud_create").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('search.casos')}}",
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data)
                },

            })
        },
        select: function(event, ui) {
            $('#solicitud_create').val(ui.item.value);
        }
    })

    $("#solucion_create").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('solucion.casos')}}",
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data)
                },

            })
        },
        select: function(event, ui) {
            $('#solucion_create').val(ui.item.value);
        }
    })
</script>




@endpush