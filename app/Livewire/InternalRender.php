<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Internal;

class InternalRender extends Component
{
    public $message, $entrada, $messageSelect = '';
    public $search = "";
    public $showdiv = false, $showdivError = false;
    public $showClose = false;
    public $records;
    protected $rules = [
        'messageSelect' => 'required',
    ];
    protected $messages = [
        'messageSelect.required' => 'Selecciona una opcion valida.',
    ];

    public function mount()
    {
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

    public function clear()
    {
        $this->reset(['message']);
        $this->reset(['search']);
        $this->showdiv = false;
        $this->showClose = false;
        $this->showdivError = false;
    }

    public function copyInternal()
    {
        $this->emit('copyInternal');
    }

    public function showAll()
    {
        $this->records = Internal::orderby('title', 'asc')
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

            $this->records = Internal::orderby('title', 'asc')
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

        $record = Internal::where('id', $id)
            ->first();

        $this->search = $record->title;
        $this->messageSelect = $record->id;
        $this->showdiv = false;
        $this->validate();
        $this->message = Internal::findOrFail($this->messageSelect);
    }
    public function clearSearch()
    {
        $this->reset(['message']);
        $this->reset(['search']);
        $this->showdiv = false;
        $this->showClose = false;
        $this->showdivError = false;
    }
}
