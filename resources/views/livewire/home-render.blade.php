<div class="mt-5">




    <div class="row">

        <div class="form-group col-3">
            <div class="search-box">
                <label>Plantilla</label>
                <div class="input-group ">
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
        <div class="form-group col-auto">
            <label>Genero</label>
            <select class="form-control" wire:model="genero">
                <option value="" disabled selected>Selecciona...</option>
                <option value="01">Male</option>
                <option value="02">Female</option>
            </select>
            @error('genero')
            <small class=" text-danger"> {{ $message }} </small>
            @enderror
        </div>
        <div class="form-group col-auto">
            <label>Apellido</label>
            <input type="text" class="form-control" wire:model="lastName">
            @error('lastName')
            <small class=" text-danger"> {{ $message }} </small>
            @enderror
        </div>


    </div>

    <button type="submit" class="btn btn-primary" wire:click="submit" wire:loading.attr="disabled" wire:target="submit">
        Crear plantilla
    </button>
    <button id="btn-copy" class="btn btn-warning" wire:click="clear" wire:loading.attr="disabled" wire:target="clear">
        Borrar plantilla
    </button>








    <div class="row ">


        @if(isset($message) && $message !=null)

        <div class="col-auto pr-1">
         
            <button class="btn btn-link" data-clipboard-target="#messageMain" data-toggle="tooltip" data-placement="left" title="Copiar">
                <i class="material-icons text-danger ">content_copy</i>
            </button>
        </div>
        <!-- <div class="col-auto ">
            <div class="row ">
                <div class="col-12   text-center align-self-start">
                    <button class="btn btn-link  m-2 p-0" data-clipboard-target="#messageMain" data-toggle="tooltip" data-placement="left" title="Copiar">
                        <i class="material-icons text-danger ">content_copy</i>
                    </button>
                </div>
                <div class="col-12   text-center align-self-end">
                    <a href="{{ route('post.edit',$message->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit  m-2" target="_blank" data-toggle="tooltip" data-placement="left" title="Editar"><i class="material-icons">
                        edit</i></a>
                </div>
            </div>


        </div> -->
        <div class="col-10 border rounded py-2 bg-white contenido-texto" id="messageMain">
            @if($genero=='01')
            <p>Estimado Sr. {{$lastName}},</p>
            
            @elseif($genero=='02')
            <p>Estimada Srta. {{$lastName}},</p>
            @endif
            <br>
            <p>{!!$message->message!!}</p>
            <br>
            @if($genero=='01')
            <p>Sr. {{$lastName}}, {{$message->salida->salida}} </p>
            @elseif($genero=='02')
            <p>Srta. {{$lastName}}, {{$message->salida->salida}} </p>
            @endif
            <br>
            Cordialmente,
            <br>
        </div>
        <div class="col-auto">
        <a href="{{ route('post.edit',$message->id) }}" class="btn btn-info btn-link btn-icon btn-sm edit " target="_blank" data-toggle="tooltip" data-placement="left" title="Editar"><i class="material-icons">edit</i></a>
        </div>
    

        @endif












    </div>


</div>