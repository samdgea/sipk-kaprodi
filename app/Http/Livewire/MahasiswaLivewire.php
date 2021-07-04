<?php

namespace App\Http\Livewire;

use App\Models\Mahasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class MahasiswaLivewire extends Component
{
    use WithPagination;

    public $searchNim;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        if (!empty($this->searchNim)) {
            $mahasiswa = Mahasiswa::where('nim_mahasiswa', 'like', $this->searchNim . '%')->orderBy('nim_mahasiswa', 'DESC')->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::orderBy('nim_mahasiswa', 'DESC')->paginate(10);
        }

        return view('livewire.mahasiswa.index', [
            'listMahasiswa' => $mahasiswa
        ]);
    }
}
