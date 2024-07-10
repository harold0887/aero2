<div>
    <div class="input-group no-border">
        <input type="text" class="form-control" placeholder="{{ __('Search') }}..." wire:model.live='search'>
        <div class="input-group-append">
            @if ($search !='')
            <div class="input-group-text" style="cursor: pointer;" wire:click="clearSearch()">
                <i class="nc-icon nc-simple-remove text-danger fw-bold ml-2"></i>
            </div>

            @else
            <div class="input-group-text">
                <i class="nc-icon nc-zoom-split ml-2"></i>
            </div>
            @endif

        </div>





    </div>
    @if ($search != '')
    <div class="position-absolute border bg-white rounded w-50">
        @if($casosSearch->count() > 0 )
        <ul class="px-0" style="list-style: none;">
            @foreach($casosSearch as $caso)
            <li>
                <a href="{{ route('casos.edit',$caso->id) }}" class="btn btn-info btn-link my-0">{{ $caso->case }}</a>
                <span class="text-muted">{{ $caso->solicitud }}</span>
            </li>
            @endforeach
        </ul>
        @else
        <div class="py-1">
            <small>
                ⚠️ ¡Ooooups! No se encontraron resultados. Intenta cambiar la busqueda.
            </small>
        </div>

        @endif

    </div>
    @endif

</div>