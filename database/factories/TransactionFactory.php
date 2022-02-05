<?php

namespace Database\Factories;

use App\Models\PurchaseTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class TransactionFactory extends Factory
{
    // Factory model
    protected $model = PurchaseTransaction::class;
    
    /**
     * Define the model's default state.
     */
    public function definition()
    {
        // Retrieve customer ID from database
        $allCustomerId = DB::table('customers')->pluck('id');
        $customerId = $this->faker->randomElement($allCustomerId);
        
        return [
            'customer_id' => $customerId,
            'total_spent' => $this->faker->randomFloat(2, $min = 5, $max = 70),
            'total_saving' => $this->faker->randomFloat(2, $min = 0, $max = 5),
            'transaction_at' => $this->faker->dateTimeBetween(
                $startDate = '-2 month', 
                $endDate = 'now'
            )
        ];
    }
}
