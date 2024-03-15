<?php

namespace App\Livewire\Admin;


use App\User;

use Livewire\Component;
use App\Models\Internal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class IndexInternal extends Component
{
    public $search = '';
    public $sortDirection = 'asc';
    public $sortField = 'title';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $posts = Internal::where(function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })->orderBy($this->sortField, $this->sortDirection)
            ->paginate(50);

         
        return view('livewire.admin.index-internal',compact('posts'));
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
