<div class="content">
    <div class="container-fluid mt--6  ">
        <div class="row m-0">
            <div class="col-12 border-bottom ">
                <h4 class="m-0  text-center">Casos trabajados</h4>
            </div>
            <div class="col-12 ">
                <div class="row  justify-content-between">
                    <div class="col-12 col-md-auto mt-2 align-self-center">
                        <a class="btn  btn-block  btn-outline-primary " href="{{ route('casos.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            <span>Agregar Caso</span>
                        </a>
                    </div>
                    <div class="col-12 col-md-3  mt-2  align-self-center">
                        <div class="input-group no-border">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="material-icons">visibility</i>
                                </div>
                            </div>
                            <select class="form-control" wire:model.change="selectStatus" style="cursor:pointer">
                                <option value="0">Todos</option>
                                <option value="1">Cerrados ({{$closed}})</option>
                                <option value="2">Pendiente ({{$pending}})</option>
                                <option value="3">En proceso ({{$in_process}})</option>
                                <option value="4">Otros ({{$other}})</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-12 col-md-3  mt-2  align-self-center">
                        @if ($search !='')
                        <div class="alert text-center alert-dismissible fade show m-0 py-0 text-primary" role="alert">
                            Borrar filtros
                            <button type="button " class="close " data-dismiss="alert" aria-label="Close" wire:click="clearSearch()">
                                <span class="text-danger" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="col-12   col-md-3 mt-2 align-self-center">
                        <div class="input-group no-border">
                            <input type="search" class="form-control" placeholder="Buscar por título..." wire:model.live='search'>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            @if (isset($casos) && $casos->count() > 0)
            <div class="col ">
                <div class="card">
                    <div class="table-responsive  p-3 ">

                        <table id="datatable" class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th style="cursor:pointer" wire:click="setSort('case')">Caso
                                        @if($sortField=='case')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th style="cursor:pointer" wire:click="setSort('status_id')" class="mx-auto">
                                        @if($sortField=='status_id')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort"></i>
                                        @endif
                                        Status
                                    </th>
                                    <th style="cursor:pointer" wire:click="setSort('created_at')" class="mx-auto">
                                        @if($sortField=='created_at')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort"></i>
                                        @endif
                                        Creado
                                    </th>
                                    <th>
                                        Días
                                    </th>
                                    <th style="cursor:pointer" wire:click="setSort('closed_at')" class="mx-auto">
                                        @if($sortField=='closed_at')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort"></i>
                                        @endif
                                        Cerrado
                                    </th>

                                    <th style="cursor:pointer" wire:click="setSort('solicitud')">Solicitud
                                        @if($sortField=='solicitud')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th>Solucion</th>
                                    <th>Notas</th>
                                    <th>Check</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($casos as $caso)
                                <tr>
                                    <td>{{ $caso->case }}</td>
                                    <td>{{ $caso->status->status }}</td>
                                    <td>{{ date_format($caso->created_at,'d-M-y') }}</td>
                                    <td>
                                        @if($caso->closed_at == null)
                                        {{ \Carbon\Carbon::createFromTimestamp(strtotime($caso->created_at))->diff(\Carbon\Carbon::now())->days}}
                                        @else
                                        0
                                        @endif
                                    </td>
                                    <td>{{isset($caso->closed_at) ? \Carbon\Carbon::parse($caso->closed_at)->format('d-M-y')  :'' }}</td>

                                    <td>{{ $caso->solicitud }}</td>
                                    <td>{{ $caso->solucion }}</td>


                                    <td>{{ $caso->notas }}</td>
                                    <td class=" text-xxs pl-4">
                                        <div class="row">
                                            <div class="col-auto ">
                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->cuenta == 1 ? 'checked ' : '' }}>
                                                        <span>Cuenta</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->valor == 1 ? 'checked ' : '' }}>
                                                        <span>Valor del cliente</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->vuelo == 1 ? 'checked ' : '' }}>
                                                        <span>Datos de vuelo</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->tipificacion == 1 ? 'checked ' : '' }}>
                                                        <span>tipificacion</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->soportes == 1 ? 'checked ' : '' }}>
                                                        <span>Soportes</span>
                                                    </label>
                                                </div>


                                            </div>
                                            <div class="col-auto">


                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->duplicado == 1 ? 'checked ' : '' }}>
                                                        <span>Duplicado</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->compensacion == 1 ? 'checked ' : '' }}>
                                                        <span>compensación</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->contingencia == 1 ? 'checked ' : '' }}>
                                                        <span>contingencia</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input class="form-check-input" type="checkbox" disabled {{ $caso->notification == 1 ? 'checked ' : '' }}>
                                                        <span>Notificacion</span>
                                                    </label>
                                                </div>


                                            </div>

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('casos.edit',$caso->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit "><i class="material-icons">edit</i></a>
                                            <form method="post" action="{{ route('casos.destroy', $caso->id) }} " id="form-delete-case">
                                                <input type="text" hidden value="el caso {{$caso->case}}">
                                                <button class=" btn btn-danger btn-link btn-icon btn-sm remove show-alert-delete-case" onclick="confirmDeleteCase('{{ $caso->id }}', '{{ $caso->case }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <i class="material-icons ">close</i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 d-flex justify-content-center">
                            {{ $casos->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12">
                <p class="alert alert-danger">⚠️ ¡Ooooups! No se encontraron resultados. Intenta cambiar la busqueda.</p>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    //Confirmar eliminar producto
    function confirmDeleteCase($id, $name) {
        var form = $("#form-delete-case");
        event.preventDefault();
        swal({
            title: "¿Realmente quiere eliminar el caso: " + $name + "  ? ",
            type: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!",
        }).then((result) => {
            if (result.value) {
                form.submit();
            } else {
                swal("Cancelado", 'El registro está seguro :)', 'error');
            }
        });
    }
</script>