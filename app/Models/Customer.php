<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    public function purchaseTransactions() {
        return $this->hasMany(PurchaseTransaction::class);
    }

    public function voucherCode() {
        return $this->hasOne(VoucherCode::class);
    }
}
