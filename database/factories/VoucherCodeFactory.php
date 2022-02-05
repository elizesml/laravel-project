<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'voucher_code' => $this->faker->regexify('[A-Za-z0-9]{14}'),
            'campaign_id' => 0,
            'customer_id' => null,
            'redeemed' => 0
        ];
    }
}
