<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(1),
            'text' => $this->faker->paragraph,
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'pic_address' => $this->faker->imageUrl(),
            'view' => $this->faker->numberBetween(0,100),
        ];
    }
}
