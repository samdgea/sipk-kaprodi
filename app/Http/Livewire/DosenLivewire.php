<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use Livewire\Component;
use Livewire\WithPagination;

class DosenLivewire extends Component
{
    use WithPagination;

    public $searchDosen;
    public $formEditDetailDosen;

    public Dosen $dosen;

    public function render()
    {
        if (!empty($this->searchDosen)) {
            $dosen = Dosen::with(['dosenDetail', 'dosenEducation'])
                ->where('first_name', 'like', '%' . $this->searchDosen . '%')
                ->orWhere('last_name', 'like', '%' . $this->searchDosen . '%')->paginate(10);
        } else {
            $dosen = Dosen::with(['dosenDetail', 'dosenEducation'])->paginate(10);
        }


        return view('livewire.dosen.index', [
            'listDosen' => $dosen
        ]);
    }
}
