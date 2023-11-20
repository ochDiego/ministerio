<?php

namespace App\Livewire\Admin;

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

    protected $paginationTheme = 'bootstrap';

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
        $this->organismos = Organismo::select('id','nombre')->get();
        $this->instituciones = Institucione::select('id','nombre')->get();
        $this->tiposDocumentos = TiposDocumento::select('id','nombre')->get();
        $this->temas = Tema::select('id','nombre')->get();
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
                                ->with('institucione','organismo','tema','tiposDocumento')
                                ->paginate(30);

        return view('livewire.admin.documentos-index',compact('documentos'));
    }
}
