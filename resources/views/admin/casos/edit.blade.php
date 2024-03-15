@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Editar caso '. $case->case,
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

                        <h4 class="card-title">Editar caso {{$case->case}}</h4>
                    </div>
                    <div class="card-body ">
                        <form id="create-post-admin" action="{{ route('casos.update', $case->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf @method('PATCH')
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-row ">
                                        <div class="form-group col-12 col-md-3">
                                            <label class="bmd-label-floating">Número de caso</label>
                                            <input type="number" class="form-control {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case" value="{{ old('case')?: $case->case }}">
                                            @error('case')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 col-md-6">
                                            <label class="bmd-label-floating">URL</label>
                                            <input type="text" class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" name="url" value="{{ old('url')?: $case->url  }}">
                                            @error('url')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-3">
                                            <label class="bmd-label-floating">Status</label>
                                            <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                                                <option value="" disabled>Selecciona...</option>
                                                @foreach($status as $item)
                                                <option value=" {{ $item->id }}" @if(old('status')) {{ old('status') == $item->id ? 'selected' : '' }}  @else {{ $case->status_id == $item->id ? 'selected' : '' }} @endif  >
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
                                            <input type="text" class="form-control {{ $errors->has('solicitud') ? 'is-invalid' : '' }}" name="solicitud" value="{{ old('solicitud')?: $case->solicitud }}" id="solicitud_create">
                                            @error('solicitud')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-md-12">
                                            <label for="solucion">Solucion</label>
                                            <textarea class=" form-control {{ $errors->has('solucion') ? 'is-invalid' : '' }}" name="solucion" value="" id="solucion_create">{{ old('solucion')?: $case->solucion }}</textarea>
                                            @error('solucion')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-md-12">
                                            <label for="nota">Notas (opcional)</label>
                                            <textarea class=" form-control {{ $errors->has('nota') ? 'is-invalid' : '' }}" name="nota" value="">{{ old('nota')?: $case->notas }}</textarea>
                                            @error('nota')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 border rounded">
                                    <div class="row">
                                        <div class="col-auto m-2">
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('cuenta') ? 'is-invalid' : '' }}" type="checkbox" name="cuenta" value="1" {{$case->cuenta == 1 ? 'checked' : ''}}  {{ old('cuenta') == 1 ? 'checked' : '' }}>
                                                    <span>Cuenta</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('valor') ? 'is-invalid' : '' }}" type="checkbox" name="valor" value="1" {{$case->valor == 1 ? 'checked' : ''}}  {{ old('valor') == 1 ? 'checked' : '' }}>
                                                    <span>Valor del cliente</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('tipificacion') ? 'is-invalid' : '' }}" type="checkbox" name="tipificacion" value="1" {{$case->tipificacion == 1 ? 'checked' : ''}}  {{ old('tipificacion') == 1 ? 'checked' : '' }}>
                                                    <span>Tipificacion</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('soportes') ? 'is-invalid' : '' }}" type="checkbox" name="soportes" value="1" {{$case->soportes == 1 ? 'checked' : ''}}  {{ old('soportes') == 1 ? 'checked' : '' }}>
                                                    <span>Soportes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input {{ $errors->has('duplicado') ? 'is-invalid' : '' }}" type="checkbox" name="duplicado" value="1" {{$case->duplicado == 1 ? 'checked' : ''}}  {{ old('duplicado') == 1 ? 'checked' : '' }}>
                                                    <span>Revisar duplicados</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input " type="checkbox" name="compensacion" value="1" {{$case->compensacion == 1 ? 'checked' : ''}}  {{ old('compensacion') == 1 ? 'checked' : '' }}>
                                                    <span>Compensación</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input class="form-check-input" type="checkbox" name="contingencia" value="1" {{$case->contingencia == 1 ? 'checked' : ''}}  {{ old('contingencia') == 1 ? 'checked' : '' }}>
                                                    <span>Contingencia</span>
                                                </label>
                                            </div>
                                        </div>



                                    </div>

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