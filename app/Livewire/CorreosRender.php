<?php

namespace App\Livewire;

use App\Correo;
use Livewire\Component;
use Livewire\WithPagination;

class CorreosRender extends Component
{
    public $search = '';
    public $sortDirection = 'asc';
    public $sortField = 'email';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $correos = Correo::where(function ($query) {
            $query->where('area', 'like', '%' . $this->search . '%')
            ->orwhere('email', 'like', '%' . $this->search . '%')
            ->orwhere('comentario', 'like', '%' . $this->search . '%');
        })->orderBy($this->sortField, $this->sortDirection)
            ->paginate(100);

        return view('livewire.correos-render', compact('correos'));
    }

     //sort
     public function setSort($field)
     {
 
         $this->sortField = $field;
 
         if ($this->sortDirection == 'desc') {
             $this->sortDirection = 'asc';
         } else {
             $this->sortDirection = 'desc';
         }
     }
     public function clearSearch()
     {
         $this->search = "";
     }
}
