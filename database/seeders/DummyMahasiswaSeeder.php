<?php

namespace Database\Seeders;

use App\Models\DetailSemester;
use App\Models\Mahasiswa;
use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class DummyMahasiswaSeeder extends Seeder
{
    public function run()
    {
        $programStudi = StudyProgram::query()->count();
        $numOfMahasiswa = config('database.dummy_data.number_of_mahasiswa', 20);

        // Generate TIF Student
        Mahasiswa::factory($numOfMahasiswa)->mahasiswaTIF()->create()
            ->each(function ($mahasiswa) {
                for($i = 1; $i <= 16; $i++) {
                    DetailSemester::factory()->create([
                        'mahasiswa_id' => $mahasiswa->id,
                        'academic_year_id' => $i
                    ]);
                }
            });


        // Generate SI Student
        Mahasiswa::factory($numOfMahasiswa)->mahasiswaSI()->create()
            ->each(function ($mahasiswa) {
                for($i = 1; $i <= 16; $i++) {
                    DetailSemester::factory()->create([
                        'mahasiswa_id' => $mahasiswa->id,
                        'academic_year_id' => $i
                    ]);
                }
            });
    }
}
