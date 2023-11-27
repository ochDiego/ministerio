<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\TiposDocumento;
use Livewire\WithPagination;

class TiposDocumentosIndex extends Component
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
        $tiposDocumentos = TiposDocumento::query()
                                        ->when($this->search, function($query){
                                            $query->where('nombre','like','%' . $this->search . '%');
                                        })
                                        ->where('activo',true)
                                        ->orderByDesc('id')
                                        ->paginate(25);

        return view('livewire.admin.tipos-documentos-index',compact('tiposDocumentos'));
    }
}
