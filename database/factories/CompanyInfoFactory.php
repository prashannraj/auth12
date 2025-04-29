<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyInfo>
 */
class CompanyInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'footnote' => $this->faker->sentence,
            'address' => $this->faker->address,
            'registration_no' => $this->faker->uuid,
            'website' => $this->faker->url,
            'logo' => 'logo.png',
            'stamp' => 'stamp.png',
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->companyEmail,
            'registered_in' => 'Nepal',
            'regulated_by' => 'Government of Nepal',
            'regulator_logo' => 'gov_logo.png',
            'regulation_no' => 'REG-' . $this->faker->numberBetween(10000, 99999),
            'vat' => 'VAT-' . $this->faker->numberBetween(100000, 999999),
        ];
    }
}
