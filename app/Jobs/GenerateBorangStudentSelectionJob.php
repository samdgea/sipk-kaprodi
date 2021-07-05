<?php

namespace App\Jobs;

use App\Models\LKPSDocuments;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class GenerateBorangStudentSelectionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /***
     * Borang Seleksi Mahasiswa List Model
     */
    protected $studentSelection;

    public function __construct(Collection $studentSelection) {
        $this->studentSelection = $studentSelection;
    }

    public function handle()
    {
        $pdf = PDF::loadView('livewire.report.printTemplate.lkps-seleksi-mahasiswa-pdf-template', ['datas' => $this->studentSelection])->setPaper('a4', 'landscape')->output();

        $periode = $this->studentSelection->first()->academicYear->tahun_akademik . '-' . $this->studentSelection->last()->academicYear->tahun_akademik;
        $path = 'sipk-demo/lkps/seleksi_mahasiswa-' . $periode . '.pdf';

        Storage::disk('s3')->put($path, $pdf);

        LKPSDocuments::create([
            'document_path' => $path
        ]);
    }
}
