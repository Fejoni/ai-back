<?php

namespace Database\Factories\Admin\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Post\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'     => 'Subject'.$this->faker->name,
            'theme_id'  => $this->faker->numberBetween(1,3)
        ];
    }
}
