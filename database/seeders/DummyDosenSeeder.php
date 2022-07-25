<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\DosenDetail;
use App\Models\DosenEducation;
use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class DummyDosenSeeder extends Seeder
{
    public function run()
    {
        $programStudi = StudyProgram::query()->count();
        $numOfDosen = config('database.dummy_data.number_of_dosen', 10);

        for($i = 1; $i <= $programStudi; $i++) {
            Dosen::factory($numOfDosen)
                ->create()
                ->each(function ($dosen) {
                    DosenDetail::factory()->create(['id_dosen' => $dosen]);
                    DosenEducation::factory()->create(['id_dosen' => $dosen]);
                });
        }
    }
}
