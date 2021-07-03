<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Mahasiswa;
use Colors\RandomColor;

class DashboardLivewire extends Component
{
    public $firstRun = true;

    public $colorsMahasiswa;
    public $colorsDosen;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $pieChartModelMahasiswa = $this->piechartMahasiswa();
        $pieChartModelDosen = $this->piechartDosen();

        return view('livewire.dashboard.index', [
            'pieChartMahasiswa' => $pieChartModelMahasiswa,
            'pieChartDosen' => $pieChartModelDosen
        ]);
    }

    private function piechartDosen() {
        $dosen = Dosen::select(DB::raw('YEAR(date_joined) as joined_year, COUNT(id) as total_dosen'))
                ->whereRaw('YEAR(date_joined) BETWEEN 2000 AND 2021')->groupBy('joined_year')->get();
        $hexList = RandomColor::many($dosen->count(), ['hue' => 'yellow', 'format' => 'hex']);

        foreach($dosen as $idx => $data) {
            $this->colorsDosen[$data->joined_year] = $hexList[$idx];
        }

        $pieChartModelDosen =  $dosen->reduce(function ($pieChartModelDosen, $data) {
                $tahunDaftar = $data->joined_year;
                $value = $data->total_dosen;

                return $pieChartModelDosen->addSlice($tahunDaftar, $value, $this->colorsDosen[$tahunDaftar]);
            }, LivewireCharts::pieChartModel()
                ->setTitle('Jumlah Dosen')
                ->setAnimated($this->firstRun)
                ->setDataLabelsEnabled(true)
                ->legendPositionBottom()
                ->legendHorizontallyAlignedCenter()
                ->setColors($this->colorsDosen)
                ->withGrid()
            );

        return $pieChartModelDosen;
    }

    private function piechartMahasiswa() {
        $mhsYears = Mahasiswa::select('tahun_daftar')->groupBy('tahun_daftar')->get()->pluck('tahun_daftar');
        $hexList = RandomColor::many($mhsYears->count(), ['hue' => 'green', 'format' => 'hex']);
        $temp = $mhsYears->toArray();

        foreach($temp as $idx => $year) {
            $this->colorsMahasiswa[$year] = $hexList[$idx];
        }

        $mahasiswa = Mahasiswa::get();

        $pieChartModelMahasiswa = $mahasiswa->groupBy('tahun_daftar')
            ->reduce(function ($pieChartModels, $data) {
                $tahunDaftar = $data->first()->tahun_daftar;
                $value = $data->count('id');

                return $pieChartModels->addSlice($tahunDaftar, $value, $this->colorsMahasiswa[$tahunDaftar]);
            }, LivewireCharts::pieChartModel()
                ->setTitle('Jumlah Mahasiswa')
                ->setAnimated($this->firstRun)
                ->setDataLabelsEnabled(true)
                ->legendPositionBottom()
                ->legendHorizontallyAlignedCenter()
                ->setColors($this->colorsMahasiswa)
                ->withGrid()
            );

        return $pieChartModelMahasiswa;
    }
}
