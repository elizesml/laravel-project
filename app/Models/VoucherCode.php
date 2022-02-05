<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherCode extends Model
{
    use HasFactory;

    protected $table = 'voucher_codes';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['code', 'campaign_id', 'customer_id', 'redeemed'];

    public function campaigns() {
        return $this->belongsTo(Campaign::class);
    }

    public function customers() {
        return $this->belongsTo(Customer::class);
    }
}
