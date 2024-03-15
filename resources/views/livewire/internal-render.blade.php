<div class="mt-5">




    <div class="form-row">
        <div class="form-group col-3">
            <label>Plantilla</label>
            <select class="form-control" wire:model="messageSelect">
                <option value="" disabled selected>Selecciona...</option>
                @foreach($mensajes as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>
            @error('messageSelect')
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








    <div class="row">


        @if(isset($message) && $message !=null)
        <div class="col-auto pr-1">
         
            <button class="btn btn-link" data-clipboard-target="#message-internal" data-toggle="tooltip" data-placement="left" title="Copiar">
                <i class="material-icons text-danger ">content_copy</i>
            </button>
        </div>
        <div class="col-8 border rounded py-2 bg-white contenido-texto-internal" id="message-internal">
            <p>Buen día, {{$message->name}}</p>
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