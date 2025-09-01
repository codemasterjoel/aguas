<?php

namespace App\Http\Livewire\MesasTecnicas;

use Livewire\Component;
use App\Models\ConsejoComunal;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Comuna;

use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $estadoId, $municipioId, $parroquiaId, $comunaId, $mesa_tecnica;
    public $estados, $municipios, $parroquias, $comunas;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $this->estados = Estado::all();
        $consejos = ConsejoComunal::where('nombre', 'like', "%$this->search%")
                ->paginate(10);
        return view('livewire.mesas-tecnicas.index', compact('consejos'));
    }
    public function updatedEstadoId($id)
    {
        $this->municipioId = null;
        $this->parroquiaId = null;
        $this->municipios = Municipio::where('estado_id', $id)->get();
    }
    public function updatedMunicipioId($id)
    {
        $this->parroquiaId = null;
        $this->parroquias = Parroquia::where('municipio_id', $id)->get();
    }
    public function updatedParroquiaId($id){
        $this->comunaId = null;
        $this->comunas = Comuna::where('parroquia_id', $id)->get();
    }
    public function guardar()
    {
        $this->validate([
            'estadoId' => 'required',
            'municipioId' => 'required',
            'parroquiaId' => 'required',
            'comunaId' => 'required',
            'mesa_tecnica' => 'required|string|max:255',
        ]);

        ConsejoComunal::create([
            'comuna_id' => $this->comunaId,
            'nombre' => strtoupper($this->mesa_tecnica),
        ]);
        $this->mesa_tecnica = null;
    }
}
