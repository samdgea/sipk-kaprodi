<?php

namespace App\Providers;

use App\Models\AcademicYear;
use App\Models\DetailSemester;
use App\Models\Dosen;
use App\Models\Faculty;
use App\Models\Form\MahasiswaAsing;
use App\Models\Form\MahasiswaLokal;
use App\Models\Mahasiswa;
use App\Models\StudyProgram;
use App\Models\User;
use App\Observers\ModelObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        User::observe(new ModelObserver);
        Dosen::observe(new ModelObserver);
        Mahasiswa::observe(new ModelObserver);

        Faculty::observe(new ModelObserver);
        StudyProgram::observe(new ModelObserver);
        AcademicYear::observe(new ModelObserver);
        DetailSemester::observe(new ModelObserver);

        MahasiswaLokal::observe(new ModelObserver);
        MahasiswaAsing::observe(new ModelObserver);
    }
}
