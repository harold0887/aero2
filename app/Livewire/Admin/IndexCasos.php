<?php


namespace App\Livewire\Admin;


use App\Models\Caso;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class IndexCasos extends Component
{

    public $search = '';

    public $sortDirection = 'desc';
    public $sortField = 'created_at';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $casos = Caso::where(function ($query) {
            $query->where('solicitud', 'like', '%' . $this->search . '%')
                ->orwhere('case', 'like', '%' . $this->search . '%')
                ->orwhere('solucion', 'like', '%' . $this->search . '%')
                ->orwhere('notas', 'like', '%' . $this->search . '%');
        })
            ->where('user_id', Auth::user()->id)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(500);

        $pending = Caso::where('user_id', Auth::user()->id)
            ->where('status_id', 2)
            ->count();
        $in_process = Caso::where('user_id', Auth::user()->id)
            ->where('status_id', 3)
            ->count();







        return view('livewire.admin.index-casos', compact('casos', 'pending', 'in_process'));
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
