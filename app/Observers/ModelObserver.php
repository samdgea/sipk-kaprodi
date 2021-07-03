<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class ModelObserver
{
    public function deleting($model) {
        $model->update(['deleted_by' => (!empty(Auth::user())) ? Auth::user()->id : null]);
    }

    public function creating($model) {
        $model->created_by = (!empty(Auth::user())) ? Auth::user()->id : null;
        $model->updated_by = (!empty(Auth::user())) ? Auth::user()->id : null;
    }

    public function updating($model) {
        $model->updated_by = (!empty(Auth::user())) ? Auth::user()->id : null;
    }
}
