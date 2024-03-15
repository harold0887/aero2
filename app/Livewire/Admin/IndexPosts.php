<?php


namespace App\Livewire\Admin;


use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class IndexPosts extends Component
{
    public $search = '';
    public $sortDirection = 'asc';
    public $sortField = 'title';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $posts = Message::where(function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })
            ->where('user_id', Auth::user()->id)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(50);



        return view('livewire.admin.index-posts', compact('posts'));
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
