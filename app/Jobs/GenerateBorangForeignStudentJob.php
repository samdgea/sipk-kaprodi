<?php

namespace App\Jobs;

use Illuminate\Database\Eloquent\Collection;
use App\Models\LKPSDocuments;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class GenerateBorangForeignStudentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $foreignStudent;

    public function __construct(Collection $foreignStudent) {
        $this->foreignStudent = $foreignStudent;
    }

    public function handle()
    {
        $pdf = PDF::loadView('livewire.report.printTemplate.lkps-mahasiswa-asing-pdf-template', ['datas' => $this->foreignStudent])->setPaper('a4', 'landscape')->output();

        $periode = $this->foreignStudent->first()->academicYear->tahun_akademik . '-' . $this->foreignStudent->last()->academicYear->tahun_akademik;
        $path = 'sipk-demo/lkps/seleksi_mahasiswa-' . $periode . '.pdf';

        Storage::disk('s3')->put($path, $pdf);

        LKPSDocuments::create([
            'document_path' => $path
        ]);
    }
}
