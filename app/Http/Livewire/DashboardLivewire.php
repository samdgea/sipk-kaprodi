<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Mahasiswa;
use Colors\RandomColor;

class DashboardLivewire extends Component
{
    public $summary = [
        'jumlahMahasiswaPeriode',
        'jumlahDosenPeriode',
        'ratioSDM'
    ];
//    public $ratioSDM;

    public $dashboardFilter;

    public $filterConfiguration = [
        'showCharts' => true,
        'viewChart' => 'column',
        'filterRange' => [
            'dosenLastEducation',
            'fromYear',
            'toYear'
        ]
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->filterConfiguration['filterRange']['toYear'] = Carbon::now()->year;
        $this->filterConfiguration['filterRange']['fromYear'] = Carbon::now()->subYears(5)->year;
        $this->filterConfiguration['filterRange']['dosenLastEducation'] = null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $this->summary['jumlahMahasiswaPeriode'] = Mahasiswa::whereBetween('tahun_daftar', [$this->filterConfiguration['filterRange']['fromYear'], $this->filterConfiguration['filterRange']['toYear']])->count();

        if (!empty($this->filterConfiguration['filterRange']['dosenLastEducation'])) {
            $this->summary['jumlahDosenPeriode'] = Dosen::whereHas('dosenEducation', function($q) {
                $q->where('education_type', $this->filterConfiguration['filterRange']['dosenLastEducation']);
            })->whereYear('date_joined', '>=', $this->filterConfiguration['filterRange']['fromYear'])
                ->whereYear('date_joined', '<=', $this->filterConfiguration['filterRange']['toYear'])->count();
        } else {
            $this->summary['jumlahDosenPeriode'] = Dosen::whereYear('date_join', '>=', $this->filterConfiguration['filterRange']['fromYear'])
                ->whereYear('date_joined', '<=', $this->filterConfiguration['filterRange']['toYear'])->count();
        }

        $this->summary['ratioSDM'] = $this->find_ratio($this->summary['jumlahMahasiswaPeriode'], $this->summary['jumlahDosenPeriode']);

        if ($this->filterConfiguration['viewChart'] == 'column') {
            $chartModel = $this->barCharts();
        } else {
            $chartModel = $this->lineCharts();
        }

        return view('livewire.dashboard.index', [
            'chartModel' => $chartModel
        ]);
    }

    public function showFilterModal() {
        $this->dashboardFilter = true;
    }

    public function closeFilterModal() {
        $this->dashboardFilter = false;
    }

    private function barCharts() {
        $barCharts = (new ColumnChartModel())
            ->setTitle('Jumlah Mahasiswa & Dosen')
            ->multiColumn()
            ->setAnimated(true)
            ->withGrid();

        $mhsYears = Mahasiswa::select(DB::raw("tahun_daftar, COUNT(id) as total_mahasiswa"))
            ->whereRaw("YEAR(tahun_daftar) BETWEEN ? AND ?", [$this->filterConfiguration['filterRange']['fromYear'], $this->filterConfiguration['filterRange']['toYear']])->groupBy('tahun_daftar')->get();

        $dosens = Dosen::select(DB::raw('YEAR(date_joined) as joined_year, COUNT(id) as total_dosen'))
            ->whereRaw("YEAR(date_joined) BETWEEN ? AND ?", [$this->filterConfiguration['filterRange']['fromYear'], $this->filterConfiguration['filterRange']['toYear']])->groupBy('joined_year')->get();

        foreach ($mhsYears as $mahasiswa) {
            $barCharts->addSeriesColumn('Mahasiswa', "$mahasiswa->tahun_daftar", $mahasiswa->total_mahasiswa);
//            $this->ratioSDM[$mahasiswa->tahun_daftar]['mahasiswa'] = $mahasiswa->total_mahasiswa;
        }

        foreach ($dosens as $dosen) {
            $barCharts->addSeriesColumn('Dosen', "$dosen->joined_year", $dosen->total_dosen);
//            $this->ratioSDM[$dosen->joined_year]['dosen'] = $dosen->total_dosen;
        }

//        foreach($this->ratioSDM as $year => $sdm) {
//            $this->ratioSDM[$year]['ratio'] = $this->find_ratio($this->ratioSDM[$year]['dosen'], $this->ratioSDM[$year]['mahasiswa']);
//        }

        return $barCharts;
    }

    private function lineCharts() {
        $lineCharts = (new LineChartModel())
            ->setTitle('Jumlah Mahasiswa & Dosen')
            ->multiLine()
            ->setAnimated(true)
            ->setSmoothCurve();

        $mhsYears = Mahasiswa::select(DB::raw("tahun_daftar, COUNT(id) as total_mahasiswa"))
                ->whereRaw("YEAR(tahun_daftar) BETWEEN ? AND ?", [$this->filterConfiguration['filterRange']['fromYear'], $this->filterConfiguration['filterRange']['toYear']])->groupBy('tahun_daftar')->get();

        $dosens = Dosen::select(DB::raw('YEAR(date_joined) as joined_year, COUNT(id) as total_dosen'))
            ->whereRaw("YEAR(date_joined) BETWEEN ? AND ?", [$this->filterConfiguration['filterRange']['fromYear'], $this->filterConfiguration['filterRange']['toYear']])->groupBy('joined_year')->get();

        foreach($mhsYears as $mahasiswa) {
            $lineCharts->addSeriesPoint('Mahasiswa' ,$mahasiswa->tahun_daftar, $mahasiswa->total_mahasiswa);
            $this->ratioSDM[$mahasiswa->tahun_daftar]['mahasiswa'] = $mahasiswa->total_mahasiswa;
        }

        foreach($dosens as $dosen) {
            $lineCharts->addSeriesPoint('Dosen' ,$dosen->joined_year, $dosen->total_dosen);
            $this->ratioSDM[$dosen->joined_year]['dosen'] = $dosen->total_dosen;
        }

        foreach($this->ratioSDM as $year => $sdm) {
            $this->ratioSDM[$year]['ratio'] = $this->find_ratio($this->ratioSDM[$year]['dosen'], $this->ratioSDM[$year]['mahasiswa']);
        }

        return $lineCharts;
    }

    private function find_ratio($num1, $num2){
        for($i = $num2; $i > 1; $i--) {
            if(($num1 % $i) == 0 && ($num2 % $i) == 0) {
                $num1 = $num1 / $i;
                $num2 = $num2 / $i;
            }
        }
        return "$num1:$num2";
    }
}
