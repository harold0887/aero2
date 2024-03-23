<?php


namespace App\Livewire\Admin;


use App\Models\Caso;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class IndexCasos extends Component
{

    public $search = '';
    public $status = '';
    public $selectStatus = '';
    public $sortDirection = 'desc';
    public $sortField = 'id';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        switch ($this->selectStatus) {
            case 0:
                $this->status = [0, 1, 2, 3, 4];
                break;
            case 1:
                $this->status = [1];
                break;
            case 2:
                $this->status = [2];
                break;
            case 3:
                $this->status = [3];
                break;
            case 4:
                $this->status = [4];
                break;
            default:
                $this->status = [0, 1, 2, 3, 4];
                break;
        }



        $casos = Caso::where(function ($query) {
            $query->where('solicitud', 'like', '%' . $this->search . '%')
                ->orwhere('case', 'like', '%' . $this->search . '%')
                ->orwhere('solucion', 'like', '%' . $this->search . '%')
                ->orwhere('notas', 'like', '%' . $this->search . '%');
        })
            ->where('user_id', Auth::user()->id)
            ->whereIn('status_id', $this->status)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(500);

        $closed = Caso::where('user_id', Auth::user()->id)
            ->where('status_id', 1)
            ->count();
        $pending = Caso::where('user_id', Auth::user()->id)
            ->where('status_id', 2)
            ->count();
        $in_process = Caso::where('user_id', Auth::user()->id)
            ->where('status_id', 3)
            ->count();
        $other = Caso::where('user_id', Auth::user()->id)
            ->where('status_id', 4)
            ->count();







        return view('livewire.admin.index-casos', compact('casos', 'closed', 'pending', 'in_process', 'other'));
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

    public function setStatus()
    {
    }
}
