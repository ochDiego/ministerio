<?php

namespace App\Livewire\Admin;

use App\Models\Organismo;
use Livewire\Component;
use Livewire\WithPagination;

class OrganismosIndex extends Component
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
        $organismos = Organismo::query()
                                ->when($this->search, function($query) {
                                    $query->where('nombre','like','%' .  $this->search . '%')
                                    ->orWhere('representante','like','%' .  $this->search . '%');
                                })
                                ->where('activo',true)
                                ->orderByDesc('id')
                                ->paginate(5);

        return view('livewire.admin.organismos-index',compact('organismos'));
    }
}
