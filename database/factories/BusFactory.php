<?php

namespace Database\Factories;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plate_number' => ucwords($this->faker->randomLetter . ' ' . $this->faker->buildingNumber . ' ' . $this->faker->randomLetter),
            'brand' => 'Mercedes',
            'seat' => $this->faker->numberBetween($min = 1, $max = 100),
            'price_per_day' => $this->faker->numberBetween($min = 100000, $max = 1000000)
        ];
    }
}