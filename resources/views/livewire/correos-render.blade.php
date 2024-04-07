<div class="mt-5">

    <div class="row mt-5">
        <div class="col-12 ">
            <div class="row  justify-content-between">
                <div class="col-12 col-md-auto mt-2 align-self-center">

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
               
                <div class="col-12   col-md-5 mt-2 align-self-center">
                    <div class="input-group no-border">
                        <input type="text" class="form-control" placeholder="Buscar por área, email o comentario..." wire:model.live="search">
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



                                </tr>
                            </thead>

                            <tbody>
                                @foreach($correos as $correo)
                                <tr>


                                    <td>{{ $correo->email }}</td>
                                    <td>{{ $correo->area }}</td>
                                    <td>{{ $correo->comentario }}</td>




                                    
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