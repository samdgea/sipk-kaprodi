<?php

namespace App\Providers;

use App\Models\DetailSemester;
use App\Models\Dosen;
use App\Models\Mahasiswa;
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
    }
}
