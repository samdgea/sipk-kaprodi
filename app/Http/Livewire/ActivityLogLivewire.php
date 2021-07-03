<?php

namespace App\Http\Livewire;

use Haruncpi\LaravelUserActivity\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityLogLivewire extends Component
{
    use WithPagination;

    public $logDetail;
    public Log $logData;
    public $differenceData;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $logs = Log::orderBy('id', 'desc')->paginate(5);

        return view('livewire.activity-log.index', [
            'logs' => $logs
        ]);
    }

    public function viewLog($id)
    {
        $this->logDetail = true;
        $this->logData = Log::find($id);
        if ($this->logData->log_type != "login") {
            $currentData = DB::table($this->logData->table_name)->find($this->logData->json_data['id']);
            $this->differenceData = [
                'currentData' => $currentData,
                'editHistory' => $this->logData->json_data
            ];
        }
    }

    public function closeModal()
    {
        $this->logDetail = null;
        $this->differenceData = null;
    }
}
