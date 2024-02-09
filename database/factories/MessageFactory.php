<?php

namespace Database\Factories;
use App\Models\message;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(3);
        $text = $this->faker->sentence(10);
        return [
            'title' => $name,
            'message' => $text,
        ];
    }

    protected $model = message::class;
}
