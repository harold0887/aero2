<?php

namespace App\Livewire;

use App\Models\Caso;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SearchAdmin extends Component
{
    public $search = '';
    public $sortDirection = 'desc';
    public $sortField = 'id';

    public function render()
    {
        $casosSearch = Caso::where(function ($query) {
            $query->where('solicitud', 'like', '%' . $this->search . '%')
                ->orwhere('case', 'like', '%' . ltrim($this->search, "0") . '%')
                ->orwhere('solucion', 'like', '%' . $this->search . '%')
                ->orwhere('notas', 'like', '%' . $this->search . '%');
        })
            ->where('user_id', Auth::user()->id)
            //->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        //dd($casosSearch);
        return view('livewire.search-admin', compact('casosSearch'));
    }
    public function clearSearch()
    {
        $this->search = "";
    }
}
