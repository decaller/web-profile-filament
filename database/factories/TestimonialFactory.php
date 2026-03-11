<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'author_name' => $this->faker->name(),
            'author_title' => $this->faker->jobTitle(),
            'content' => $this->faker->paragraphs(2, true),
            'avatar' => null,
            'is_active' => true,
        ];
    }
}
