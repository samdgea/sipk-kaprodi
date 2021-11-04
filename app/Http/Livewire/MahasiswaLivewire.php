<?php

namespace App\Http\Livewire;

use App\Models\AcademicYear;
use App\Models\Mahasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class MahasiswaLivewire extends Component
{
    use WithPagination;

    public $searchMahasiswa;
    public $filter = [
        'programStudi' => null,
        'tahunAngkatan' => null
    ];

    public $listAngkatan;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $this->listAngkatan = AcademicYear::groupBy('tahun_akademik')->pluck('tahun_akademik');

        if (!empty($this->searchMahasiswa)) {
            if (!empty($this->filter['tahunAngkatan'])) {
                $mahasiswa = Mahasiswa::where('nim_mahasiswa', 'like', $this->filter['tahunAngkatan'] . '%')->where('first_name', 'like', '%' . $this->searchMahasiswa . '%')->orWhere('last_name', 'like', '%' . $this->searchMahasiswa . '%')->orderBy('nim_mahasiswa', 'DESC')->paginate(10);
            } else {
                $mahasiswa = Mahasiswa::where('first_name', 'like', '%' . $this->searchMahasiswa . '%')->orWhere('last_name', 'like', '%' . $this->searchMahasiswa . '%')->orderBy('nim_mahasiswa', 'DESC')->paginate(10);
            }
        } else {
            if (!empty($this->filter['tahunAngkatan'])) {
                $mahasiswa = Mahasiswa::where('nim_mahasiswa', 'like', $this->filter['tahunAngkatan'] . '%')->orderBy('nim_mahasiswa', 'DESC')->paginate(10);
            } else {
                $mahasiswa = Mahasiswa::orderBy('nim_mahasiswa', 'DESC')->paginate(10);
            }
        }

        return view('livewire.mahasiswa.index', [
            'listMahasiswa' => $mahasiswa
        ]);
    }
}
