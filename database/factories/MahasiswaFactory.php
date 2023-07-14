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
        $tahunDaftar = $this->faker->year;
        $expectedGraduateYear = (int)$tahunDaftar + 4;

        return [
            'faculty_id' => 1,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'tahun_daftar' => $tahunDaftar,
            'expected_graduate_year' => $expectedGraduateYear,
            'gender' => $this->faker->randomElement(['M', 'F']),

        ];
    }

    public function tahunDaftar($tahun) {
        $tahunDaftar = '20' . $tahun;
        $expectedGraduateYear = (int)$tahunDaftar + 4;

        return $this->state(function (array $attributes) use ($tahunDaftar, $expectedGraduateYear) {
            return [
                'tahun_daftar' => $tahunDaftar,
                'expected_graduate_year' => $expectedGraduateYear
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
