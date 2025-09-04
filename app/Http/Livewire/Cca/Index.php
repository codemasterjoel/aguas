<?php

namespace App\Http\Livewire\Cca;

use Livewire\Component;
use App\Models\Comuna;

use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $comunas = Comuna::where('nombre', 'like', "%$this->search%")
                ->paginate(10);
        return view('livewire.cca.index', compact('comunas'));
    }
}
