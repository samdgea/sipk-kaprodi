<?php

namespace Database\Factories;

use App\Models\DosenDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DosenDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->unique()->address,
            'email_address' => $this->faker->unique()->companyEmail,
            'phone_number' => $this->faker->unique()->phoneNumber,
            'home_number' => $this->faker->unique()->phoneNumber
        ];
    }
}
