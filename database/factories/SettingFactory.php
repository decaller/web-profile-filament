<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Setting>
 */
class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition(): array
    {
        return [
            'site_title' => $this->faker->company(),
            'site_description' => $this->faker->sentence(12),
            'site_favicon' => null,
            'site_logo' => null,
            'contact_email' => $this->faker->safeEmail(),
            'contact_phone' => $this->faker->phoneNumber(),
            'contact_address' => $this->faker->address(),
            'social_links' => [
                ['platform' => 'Facebook', 'url' => 'https://facebook.com'],
                ['platform' => 'Instagram', 'url' => 'https://instagram.com'],
            ],
        ];
    }
}
