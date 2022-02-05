<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    // Factory model
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['Male', 'Female']);
        
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $gender,
            'date_of_birth' => $this->faker->date('Y-m-d', $max = 'now'),
            'contact_number' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
