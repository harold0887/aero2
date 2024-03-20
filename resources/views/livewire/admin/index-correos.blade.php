<div class="content">
    <div class="container-fluid mt--6  ">
        <div class="row m-0">
            <div class="col-12 border-bottom ">
                <h4 class="m-0  text-center">Correos</h4>
            </div>
            <div class="col-12 ">
                <div class="row  justify-content-between">
                    <div class="col-12 col-md-auto mt-2 align-self-center">
                        <a class="btn  btn-block  btn-outline-primary " href="{{ route('correo.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            <span>Agregar correo</span>
                        </a>
                    </div>
                    <div class="col-12 col-md-3  mt-2  align-self-center">
                        @if ($search !='')
                        <div class="alert text-center alert-dismissible fade show m-0 py-0 text-primary" role="alert">
                            Borrar filtros
                            <button type="button " class="close " data-dismiss="alert" aria-label="Close" wire:click.live="clearSearch()">
                                <span class="text-danger" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="col-12   col-md-5 mt-2 align-self-center">
                        <div class="input-group no-border">
                            <input type="text" class="form-control" placeholder="Buscar por área, email o comentario..." wire:model.live='search'>
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
            @if (isset($correos) && $correos->count() > 0)
            <div class="col ">
                <div class="card">

                    <div class="table-responsive  p-md-4 " id="users-table">
                        <table id="datatable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('email')">Email
                                        @if($sortField=='email')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('area')">Area
                                        @if($sortField=='area')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('comentario')">Comentario
                                        @if($sortField=='comentario')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('created_at')">Creado
                                        @if($sortField=='created_at')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col" style="cursor:pointer" wire:click="setSort('updated_at')">Ultima modificacion
                                        @if($sortField=='updated_at')
                                        @if($sortDirection=='asc')
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                        @else
                                        <i class="fa-solid fa-arrow-up-z-a"></i>
                                        @endif
                                        @else
                                        <i class="fa-solid fa-sort mr-1"></i>
                                        @endif
                                    </th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($correos as $correo)
                                <tr>
                                    <td>{{ $correo->email }}</td>
                                    <td>{{ $correo->area }}</td>
                                    <td>{{ $correo->comentario }}</td>
                                    <td>{{ date_format($correo->created_at, 'd-M-Y')  }}</td>
                                    <td>{{ date_format($correo->updated_at, 'd-M-Y')  }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('correo.edit',$correo->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit "><i class="material-icons">edit</i></a>

                                            <form method="post" action="{{ route('correo.destroy', $correo->id) }} ">
                                                <input type="text" hidden value="el correo {{$correo->email}}">
                                                <button class=" btn btn-danger btn-link btn-icon btn-sm remove show-alert-delete-email">
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
                            {{ $correos->links() }}
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