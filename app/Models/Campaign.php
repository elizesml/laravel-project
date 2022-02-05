<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $table = 'campaigns';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['name', 'start_date', 'end_date', 'active', 'image_path'];

    public function voucherCodes() {
        return $this->hasMany(VoucherCode::class);
    }
}
