<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'faculty_id' => 1,
//            'study_program_id' => 1,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'tahun_daftar' => '20',
            'gender' => $this->faker->randomElement(['M', 'F'])
        ];
    }

    public function tahunDaftar($tahun) {
        return $this->state(function (array $attributes) use ($tahun) {
            return [
                'tahun_daftar' => '20' . $tahun
            ];
        });
    }

    public function mahasiswaTIF()
    {
        return $this->state(function (array $attributes) {
            return [
                'study_program_id' => 1
            ];
        });
    }

    public function mahasiswaSI()
    {
        return $this->state(function (array $attributes) {
            return [
                'study_program_id' => 2
            ];
        });
    }
}
