<?php

namespace Database\Factories;

use App\Models\Borrow;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Borrow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'user_id' => $this->faker->numberBetween(1, 50),
            'book_id' => $this->faker->numberBetween(1, 50),
            'status' => 0
        ];
    }
}
