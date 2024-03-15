<?php

namespace App\Livewire;

use App\Salida;

use App\Models\Message;
use Livewire\Component;

class HomeRender extends Component
{
    public $message,  $messageSelect = '',  $genero = '', $lastName;

    public $showdiv = false, $showdivError = false;
    public $search = "";
    public $records;
    public $empDetails;
    public $showClose = false;


    protected $rules = [
        'search' => 'required',
        'genero' => 'required',
        'lastName' => 'required',
    ];
    protected $messages = [
        'search.required' => 'El campo plantilla es obligatorio.',
        'genero.required' => 'Selecciona una opcion valida.',
        'lastName.required' => 'El campo apellido es obligatorio.',
    ];



    public function render()
    {
        $mensajes = Message::orderBy('title', 'asc')->get();
        return view('livewire.home-render', compact('mensajes'));
    }

    public function submit()
    {


        $this->validate();
        $this->message = Message::findOrFail($this->messageSelect);
    }

    public function clear()
    {
        $this->reset(['message', 'messageSelect', 'genero', 'lastName', 'search', 'showdivError']);
        $this->showClose = false;
    }


    public function showAll()
    {
        $this->records = Message::orderby('title', 'asc')
            ->get();

        if ($this->records->count() > 0) {
            $this->showdiv = true;
            $this->showClose = true;
        }
    }

    // Fetch records
    public function searchResult()
    {

        if (!empty($this->search)) {

            $this->records = Message::orderby('title', 'asc')
                ->where('title', 'like', '%' . $this->search . '%')
                ->get();

            if ($this->records->count() > 0) {
                $this->showdiv = true;
                $this->showdivError = false;
            } else {
                $this->showdiv = false;
                $this->showdivError = true;
            }
        } else {
            $this->showdiv = false;
            $this->showdivError = false;
        }
    }

    // Fetch record by ID
    public function fetchEmployeeDetail($id = 0)
    {

        $record = Message::where('id', $id)
            ->first();

        $this->search = $record->title;
        $this->messageSelect = $record->id;
        $this->showdiv = false;
    }

    public function clearSearch()
    {
        $this->reset(['search']);
        $this->showdiv = false;
        $this->showClose = false;
        $this->showdivError = false;
    }

    public function copy()
    {
        $this->emit('copy');
    }
}
