<?php

namespace App\Livewire;

use App\Internal;
use Livewire\Component;

class InternalRender extends Component
{
    public $message, $entrada, $messageSelect = '', $salida, $salidaSelect, $genero = '', $lastName;
    protected $rules = [
        'messageSelect' => 'required',




        // 'socialNetwork' => 'required|string',
        // 'fop' => 'required',
        // 'payment' => 'required|image',
        // 'name' => 'required|string'
    ];
    protected $messages = [
        'messageSelect.required' => 'Selecciona una opcion valida.',


     



    ];

    public function mount(){
        $this->salidaSelect=1;
    }
    public function render()
    {
        $mensajes = Internal::orderBy('title', 'asc')->get();
    
       
        return view('livewire.internal-render', compact('mensajes'));
    }
    public function submit()
    {


        $this->validate();
        $this->message = Internal::findOrFail($this->messageSelect);
        
    }

    public function clear(){
        $this->reset(['message','messageSelect','genero','lastName']);
        $this->salidaSelect=1;
    }

    public function copyInternal()
    {
        $this->emit('copyInternal');
    }
}
