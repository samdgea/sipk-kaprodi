<?php

namespace Database\Factories;

use App\Models\DosenEducation;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenEducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DosenEducation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_dosen' => $this->faker->randomDigitNotZero(),
            'education_type' => $this->faker->randomElement(['S2', 'S3']),
            'university_name' => $this->faker->randomElement(['Universitas Persada Indonesia Y.A.I', 'Universitas Indonesia', 'Universitas Bina Nusantara', 'Universitas Airlangga', 'Universitas Gunadarma', 'Universitas Gajah Mada']),
            'enrollment_major' => $this->faker->randomElement(['Architectural Engineering', 'Civil Engineering', 'Computer Engineering', 'Electrical Engineering', 'Industrial Engineering', 'Mechanical Engineering', 'Accounting', 'Business Administration', 'Law', 'Psychology']),
            'graduation_date' => $this->faker->dateTimeBetween("-25 years", "-1 years"),
            'ipk_score' => $this->faker->randomFloat(2, 2.00, 4.00),
        ];
    }

    public function dosenNumber($id_dosen) {
        return $this->state(function (array $attributes) use ($id_dosen) {
            return [
                'id_dosen' => $id_dosen
            ];
        });
    }
}
