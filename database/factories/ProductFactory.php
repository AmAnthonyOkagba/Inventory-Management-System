<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        // $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        return [
            'name' => $this->faker->unique()->words($nb=4,$asText=true),
            'regular_price' => $this->faker->numberBetween(500,5000),
            'quanity' => $this->faker->numberBetween(100,200),
        ];
    }
}
