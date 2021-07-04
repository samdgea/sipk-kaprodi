<?php

namespace App\Http\Livewire;

use App\Models\AcademicYear;
use App\Models\Form\MahasiswaAsing;
use App\Models\Form\MahasiswaLokal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class AcademicYearLivewire extends Component
{
    use WithPagination;

    public $searchYear;

    public $formAcademicYear;
    public AcademicYear $acYear;

    public $formViewBorangLokal;
    public $formBorangLokal;
    public MahasiswaLokal $borangLokal;

    public $formViewBorangAsing;
    public $formBorangAsing;
    public MahasiswaAsing $borangAsing;

    protected $rules = [
        'acYear.tahun_akademik' => 'required',
        'acYear.semester_akademik' => 'required|in:1,2',
        'borangLokal.daya_tampung_mhs' => 'required|numeric',
        'borangLokal.jumlah_calon_pendaftar' => 'required|numeric',
        'borangLokal.jumlah_lulus_seleksi' => 'required|numeric',
        'borangLokal.jumlah_mahasiswa_reguler_baru' => 'required|numeric',
        'borangLokal.jumlah_mahasiswa_transfer_baru' => 'required|numeric',
        'borangLokal.jumlah_mahasiswa_reguler_aktif' => 'required|numeric',
        'borangLokal.jumlah_mahasiswa_transfer_aktif' => 'required|numeric',
        'borangAsing.jumlah_mahasiswa_aktif' => 'required|numeric',
        'borangAsing.jumlah_mahasiswa_asing_full_time' => 'required|numeric',
        'borangAsing.jumlah_mahasiswa_asing_part_time' => 'required|numeric'
    ];

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (!empty($this->searchYear) && Str::length($this->searchYear) >= 2) {
            $academicYear = AcademicYear::where('tahun_akademik', 'like', '%' . $this->searchYear . '%')->orderBy('tahun_akademik', 'desc')->paginate(5);
        } else {
            $academicYear = AcademicYear::orderBy('tahun_akademik', 'desc')->paginate(5);
        }
        return view('livewire.academic-year.index', [
            'academicYear' => $academicYear
        ]);
    }

    public function createNewAcademicYear()
    {
        $this->acYear = new AcademicYear();
        $this->formAcademicYear = true;
    }

    public function viewBorangMahasiswaLokal($idAcademic) {
        $this->borangLokal = MahasiswaLokal::where('academic_year_id', $idAcademic)->first();
        $this->formViewBorangLokal = true;
    }

    public function viewBorangMahasiswaAsing($idAcademic) {
        $this->borangAsing = MahasiswaAsing::where('academic_year_id', $idAcademic)->first();
        $this->formViewBorangAsing = true;
    }

    public function closeViewBorangMahasiswaAsing() {
        $this->borangAsing = new MahasiswaAsing();
        $this->formViewBorangAsing = false;
    }

    public function closeViewBorangMahasiswaLokal() {
        $this->borangLokal = new MahasiswaLokal();
        $this->formViewBorangLokal = false;
    }

    public function createNewBorangMahasiswaAsing($idAcademic)
    {
        $this->acYear = AcademicYear::find($idAcademic);
        if (empty($this->acYear)) {
            $this->dispatchBrowserEvent('send-toast', [
                "type" => "error",
                "message" => "Invalid Academic Year, make sure it's exists"
            ]);
            return;
        }
        $this->borangAsing = new MahasiswaAsing();
        $this->formBorangAsing = true;
    }

    public function closeFormBorangAsing()
    {
        $this->borangAsing = new MahasiswaAsing();
        $this->formBorangAsing = false;
    }

    public function createNewBorangMahasiswaLokal($idAcademic)
    {
        $this->acYear = AcademicYear::find($idAcademic);
        if (empty($this->acYear)) {
            $this->dispatchBrowserEvent('send-toast', [
                "type" => "error",
                "message" => "Invalid Academic Year, make sure it's exists"
            ]);
            return;
        }
        $this->borangLokal = new MahasiswaLokal();
        $this->formBorangLokal = true;
    }

    public function submitNewAcademicYear()
    {
        $exists = AcademicYear::where('tahun_akademik', $this->acYear->tahun_akademik)->where('semester_akademik', $this->acYear->semester_akademik)->first();
        if ($exists != null) {
            $this->addError('acYear.tahun_akademik', 'Academic Year already exist in database');
            $this->addError('acYear.semester_akademik', 'Academic Semester already exist in database');
            return;
        }

        $this->acYear->save();

        $this->dispatchBrowserEvent('send-toast', [
            "type" => "success",
            "message" => "New Academic year has been added"
        ]);

        $this->closeNewAcademicYear();
    }

    public function submitFormBorangLokal()
    {
        $this->borangLokal->academic_year_id = $this->acYear->id;
        $this->borangLokal->save();

        $this->dispatchBrowserEvent('send-toast', [
            "type" => "success",
            "message" => "Form for Academic year {$this->acYear->tahun_akademik} semester {$this->acYear->semester_akademik} has been submitted successfully"
        ]);

        $this->closeFormBorangLokal();
    }

    public function submitFormBorangAsing()
    {
        $this->borangAsing->academic_year_id = $this->acYear->id;
        $this->borangAsing->save();

        $this->dispatchBrowserEvent('send-toast', [
            "type" => "success",
            "message" => "Form for Academic year {$this->acYear->tahun_akademik} semester {$this->acYear->semester_akademik} has been submitted successfully"
        ]);

        $this->closeFormBorangAsing();
    }

    public function clearFormBorangLokal()
    {
        $this->clearAcademicYearData();
        $this->borangLokal = new MahasiswaLokal();
    }

    public function closeFormBorangLokal()
    {
        $this->clearFormBorangLokal();
        $this->formBorangLokal = false;
    }

    public function closeNewAcademicYear()
    {
        $this->formAcademicYear = false;
        $this->clearAcademicYearData();
    }

    private function clearAcademicYearData()
    {
        $this->acYear = new AcademicYear();
    }
}
