<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Driver;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bus_id' => Bus::factory(),
            'driver_id' => Driver::factory(),
            'contact_name' => $this->faker->name,
            'contact_phone' => $this->faker->phoneNumber,
            'start_rent_date' => $this->faker->date($format = 'Y-m-d', $min = date('Y-m-d', strtotime('1 day'))),
            'total_rent_days' => $this->faker->numberBetween($min = 1, $max = 60)
        ];
    }
}
