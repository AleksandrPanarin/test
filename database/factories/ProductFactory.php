<?php

namespace Database\Factories;

use App\Models\Product;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'art' => $this->faker->uuid,
            'name' => $this->faker->realTextBetween(10,20),
            'status' => $this->faker->randomElement([Product::STATUS_AVAILABLE, Product::STATUS_UNAVAILABLE]),
            'data' => [
                'color' => $this->faker->colorName,
                'size' => $this->faker->numberBetween(1, 200)
            ]
        ];
    }
}
