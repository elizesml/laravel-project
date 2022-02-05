<?php

namespace Database\Seeders;

use App\Models\VoucherCode;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CustomerSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
