<div class="mt-5">




    <div class="row d-flex align-items-end">
        <div class="form-group col-3">
            <div class="search-box">
                <label>Plantilla</label>
                <div class="input-group my-0">
                    <input type='text' wire:model="search" wire:click="showAll" wire:keyup="searchResult" class="form-control ">
                    @if ($search != '' || $showClose==true)
                    <span class="input-group-text" style="cursor:pointer" wire:click="clearSearch()"><i class="material-icons my-auto mx-1 text-lg text-danger">close</i></span>
                    @endif
                </div>
                @error('search')
                <small class=" text-danger"> {{ $message }} </small>
                @enderror
                <!-- Search result list -->
                @if($showdiv)
                <div>
                    <ul class="rounded shadow border border-info" id="showDiv">
                        @if(!empty($records))
                        @foreach($records as $record)
                        <li wire:click="fetchEmployeeDetail({{ $record->id }})">{{ $record->title}}</li>
                        @endforeach
                        @endif
                    </ul>
                </div>

                @endif
                @if($showdivError)
                <small class=" text-danger">No existen coincidencias con: {{$search}} </small>
                @endif
            </div>
        </div>
        <!-- <div class="col-auto">
            <button id="btn-copy" class="btn btn-warning" wire:click="clear" wire:loading.attr="disabled" wire:target="clear">
                Borrar plantilla
            </button>
        </div> -->

    </div>



    <div class="row">


        @if(isset($message) && $message !=null)
        <div class="col-auto pr-1">

            <button class="btn btn-link" data-clipboard-target="#message-internal" data-toggle="tooltip" data-placement="left" title="Copiar">
                <i class="material-icons text-danger ">content_copy</i>
            </button>
        </div>
        <div class="col-8  rounded  bg-white contenido-texto-internal" id="message-internal">
            {!!$message->message!!}
        </div>
        <div class="col-auto">
            <div class="row">
                <div class="col-12"><i>{{$message->email}}</i></div>
                <div class="col-12 small mt-2">
                    @if($message->nota)
                    Nota: {{$message->nota}}
                    @endif
                </div>
                <div class="col-12 ">
                    <a href="{{ route('internal.edit',$message->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit " target="_blank"><i class="material-icons">edit</i></a>
                </div>
            </div>
        </div>


        @endif












    </div>


</div>