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
        $tahun  = $this->faker->randomElements(['14', '15', '16', '17', '18', '19', '20', '21'], 1)[0];
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'nim_mahasiswa' => $tahun . $this->faker->randomElements(['44', '43', '45', '33', '34'], 1)[0] . $this->faker->randomElements(['10', '11', '12', '13', '14', '15', '16', '17', '18', '19'], 1)[0] . str_pad(random_int(0000, 9999), 4, '0', STR_PAD_LEFT),
            'tahun_daftar' => '20' . $tahun,
            'gender' => $this->faker->randomElement(['M', 'F']),
            'program_studi' => $this->faker->randomElement(['TIF', 'SI', 'ARS'])
        ];
    }
}
