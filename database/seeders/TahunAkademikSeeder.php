<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Seeder;

class TahunAkademikSeeder extends Seeder
{
    public function run()
    {
        for($i = 2015; $i <= 2022; $i++) {
            AcademicYear::create([
                'tahun_akademik' => (string)$i,
                'semester_akademik' => 1,
                'created_by' => 0
            ]);
            AcademicYear::create([
                'tahun_akademik' => (string)$i,
                'semester_akademik' => 2,
                'created_by' => 0
            ]);
        }
    }
}
