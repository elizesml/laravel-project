<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTransactionsTable extends Migration
{
    //Run the migrations
    public function up()
    {
        Schema::create('purchase_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
            
            $table->decimal('total_spent', 10, 2);
            $table->decimal('total_saving', 10, 2);
            $table->timestamp('transaction_at');
        });
    }

    // Reverse the migrations
    public function down()
    {
        Schema::dropIfExists('purchase_transactions');
    }
}
