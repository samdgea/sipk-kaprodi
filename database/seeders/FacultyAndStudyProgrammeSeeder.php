<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class FacultyAndStudyProgrammeSeeder extends Seeder
{
    public function run()
    {
        $ft = [
            '19' => 'Teknik Informatika',
            '18' => 'Sistem Informasi',
        ];

        $fak = Faculty::create([
            'kode_fakultas' => '44',
            'nama_fakultas' => 'Teknik',
            'created_by' =>  0
        ]);

        foreach($ft as $kode => $nama) {
            StudyProgram::create([
                'faculty_id' => $fak->id,
                'kode_program_studi' => $kode,
                'nama_program_studi' => $nama,
                'created_by' => 0
            ]);
        }
    }
}
