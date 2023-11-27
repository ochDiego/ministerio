<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Institucione;
use Livewire\WithPagination;

class InstitucionesIndex extends Component
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
        $instituciones = Institucione::query()
                                ->when($this->search, function($query) {
                                    $query->where('nombre','like','%' .  $this->search . '%')
                                    ->orWhere('representante','like','%' .  $this->search . '%');
                                })
                                ->where('activo',true)
                                ->orderByDesc('id')
                                ->paginate(25);

        return view('livewire.admin.instituciones-index',compact('instituciones'));
    }
}
