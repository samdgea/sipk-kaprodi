<?php

namespace Database\Factories;

use App\Models\DetailSemester;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailSemesterFactory extends Factory
{
    protected $model = DetailSemester::class;

    public function definition(): array
    {
        return [
            'academic_year_id' => $this->faker->numberBetween(1, 16),
            'ips' => $this->faker->randomFloat(2, 1, 5.0)
        ];
    }
}
