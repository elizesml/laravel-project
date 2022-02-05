<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\TransactionFactory;

class PurchaseTransaction extends Model
{
    protected $table = 'purchase_transactions';

    protected $primaryKey = 'id';
    
    public $timestamps = false;

    // Create a new factory instance
    protected static function factory() {
        return TransactionFactory::new();
    }

    public function customers() {
        return $this->belongsTo(Customer::class);
    }
}
