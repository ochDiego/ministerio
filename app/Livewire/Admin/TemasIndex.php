<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Tema;
use Livewire\WithPagination;

class TemasIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $temas = Tema::query()
                    ->when($this->search, function($query){
                        $query->where('nombre','like','%' . $this->search . '%');
                    })
                    ->where('activo',true)
                    ->orderByDesc('id')
                    ->paginate(25);

        return view('livewire.admin.temas-index',compact('temas'));
    }
}
