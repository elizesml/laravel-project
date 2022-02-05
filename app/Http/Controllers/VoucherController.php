<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmountValidation;
use App\Models\VoucherCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function create($id)
    {
        return view('vouchers.generate_vouchers', [
            'id' => $id
        ]);
    }

    /**
     * Bug
     * Throws an error when it's a string
     */
    public function store(AmountValidation $request)
    {   
        $request->validated();

        for ($i = 0; $i < $request->amount; $i++) {
            $randomString = strtoupper(Str::random(14));

            DB::table('voucher_codes')->insert([
                'code' => $randomString,
                'campaign_id' => $request->id,
                'customer_id' => null,
                'redeemed' => false
            ]);
        }

        return redirect('/admin');
    }
}
