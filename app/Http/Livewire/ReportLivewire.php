<?php

namespace App\Http\Livewire;

use App\Jobs\GenerateBorangForeignStudentJob;
use App\Jobs\GenerateBorangStudentSelectionJob;
use App\Models\AcademicYear;
use App\Models\Form\MahasiswaAsing;
use App\Models\Form\MahasiswaLokal;
use App\Models\LKPSDocuments;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ReportLivewire extends Component
{
    use WithPagination;

    public $formGenerateStudentSelection;
    public $formGenerateForeignStudent;

    public $yearSelection;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $listYearSelection = AcademicYear::whereBetween('tahun_akademik', [Carbon::now()->subYears(3)->format('Y'), Carbon::now()->format('Y')])->get()->pluck('tahun_akademik')->unique();
        $readyDocuments = LKPSDocuments::paginate(5);

        return view('livewire.report.index', [
            'listAvailableYears' => $listYearSelection,
            'readyDocuments' => $readyDocuments
        ]);
    }

    public function makeLKPSStudentSelection()
    {
        $this->formGenerateStudentSelection = true;
    }

    public function makeLKPSForeignStudent()
    {
        $this->formGenerateForeignStudent = true;
    }

    public function close()
    {
        $this->yearSelection = null;
        $this->formGenerateStudentSelection = false;
        $this->formGenerateForeignStudent = false;
    }

    public function submitGenerateStudentSelectionLKPS()
    {
        if ($this->validateSelection()) {
            $borangLokal = AcademicYear::whereRaw("YEAR(tahun_akademik) <= $this->yearSelection")->orderbyRaw('tahun_akademik DESC, semester_akademik DESC')->limit(5)->pluck('id');
            if ($borangLokal->count() != 5) {
                $this->addError('yearSelection', 'Form was not filled completely. Please fill it first');
            } else {
                $checkBorang = MahasiswaLokal::whereIn('academic_year_id', $borangLokal->toArray())->get();
                if ($checkBorang->count() !== 5) {
                    $this->addError('yearSelection', 'Form was not filled completely. Please fill it first');
                } else {
                    dispatch(new GenerateBorangStudentSelectionJob($checkBorang));
                    $this->jobHasBeenDispatched();
                }
            }

        }
    }

    public function downloadFile($documentID)
    {
        $document = LKPSDocuments::find($documentID);

        if (!empty($document)) {
            if (\Storage::disk('s3')->exists($document->document_path)) {
                return \Storage::disk('s3')->download($document->document_path);
            } else {
                $this->dispatchBrowserEvent('send-toast', [
                    "type" => "error",
                    "message" => "Document not found on CDN Server, either deleted or moved"
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('send-toast', [
                "type" => "error",
                "message" => "Invalid Document ID"
            ]);
        }
    }

    public function submitGenerateForeignStudentLKPS()
    {
        if($this->validateSelection()) {
            $academicYears = AcademicYear::whereRaw("YEAR(tahun_akademik) <= $this->yearSelection")->orderbyRaw('tahun_akademik DESC, semester_akademik DESC')->limit(3)->pluck('id');
            if ($academicYears->count() != 3) {
                $this->addError('yearSelection', 'Form was not filled completely. Please fill it first');
            } else {
                $listBorang = MahasiswaAsing::whereIn('academic_year_id', $academicYears->toArray())->get();
                if ($listBorang->count() !== 3) {
                    $this->addError('yearSelection', 'Form was not filled completely. Please fill it first');
                } else {
                    dispatch(new GenerateBorangForeignStudentJob($listBorang));
                    $this->jobHasBeenDispatched();
                }
            }
        }
    }

    private function validateSelection()
    {
        if (empty($this->yearSelection)) {
            $this->addError('yearSelection', 'Please choose academic year to proceed');
            return false;
        }
        return true;
    }

    private function featureOnDeveloping()
    {
        $this->dispatchBrowserEvent('send-toast', [
            "type" => "error",
            "message" => "This function still under development"
        ]);
    }

    private function jobHasBeenDispatched()
    {
        $this->dispatchBrowserEvent('send-toast', [
            "type" => "info",
            "message" => "The document has successfully entered the queue"
        ]);
    }
}
