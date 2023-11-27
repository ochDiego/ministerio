<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Documento;
use App\Models\Institucione;
use App\Models\Organismo;
use App\Models\Tema;
use App\Models\TiposDocumento;
use Livewire\WithPagination;


class DocumentosIndex extends Component
{
    use WithPagination;

    public $organismoFilter;
    public $institucionFilter;
    public $fechaFilter;
    public $temaFilter;
    public $tiposDocFilter;

    public $organismos;
    public $instituciones;
    public $tiposDocumentos;
    public $temas;

    public function mount()
    {
        $this->organismos = Organismo::select('id','nombre')->orderBy('nombre','asc')->get();
        $this->instituciones = Institucione::select('id','nombre')->orderBy('nombre','asc')->get();
        $this->tiposDocumentos = TiposDocumento::select('id','nombre')->orderBy('nombre','asc')->get();
        $this->temas = Tema::select('id','nombre')->orderBy('nombre','asc')->get();
    }

    public function updatingOrganismoFilter()
    {
        $this->resetPage();
    }

    public function updatingInstitucionFilter()
    {
        $this->resetPage();
    }

    public function updatingFechaFilter()
    {
        $this->resetPage();
    }

    public function updatingTemaFilter()
    {
        $this->resetPage();
    }

    public function updatingTiposDocFilter()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $documentos = Documento::query()
                                ->when($this->fechaFilter, function($query) {
                                    $query->where('fecha_suscripcion', $this->fechaFilter);
                                })
                                ->when($this->organismoFilter, function($query) {
                                    $query->where('organismo_id', $this->organismoFilter);
                                })
                                ->when($this->institucionFilter, function($query) {
                                    $query->where('institucione_id', $this->institucionFilter);
                                })
                                ->when($this->tiposDocFilter, function($query) {
                                    $query->where('tipos_documento_id', $this->tiposDocFilter);
                                })
                                ->when($this->temaFilter, function($query) {
                                    $query->where('tema_id', $this->temaFilter);
                                })
                                ->where('activo',true)
                                ->with('institucione','organismo','tema','tiposDocumento')
                                ->orderByDesc('id')
                                ->paginate(30);

        return view('livewire.documentos-index',compact('documentos'));
    }
}
