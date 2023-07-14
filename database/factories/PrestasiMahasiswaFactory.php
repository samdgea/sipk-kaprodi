<?php

namespace Database\Factories;

use App\Models\PrestasiMahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestasiMahasiswaFactory extends Factory
{
    protected $model = PrestasiMahasiswa::class;

    public function definition(): array
    {
        return [
            'tipe_prestasi' => $this->faker->randomElement(['AKADEMIK', 'NON-AKADEMIK']),
            'nama_prestasi' => $this->faker->title,
            'tanggal_perolehan_prestasi' => $this->faker->date,
            'file_dokumen_prestasi' => $this->faker->file
        ];
    }
}
