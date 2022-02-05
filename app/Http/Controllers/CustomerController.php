<?php

namespace App\Http\Controllers;

use App\Events\ImageUpload;
use App\Jobs\CustomerJob;
use App\Models\Customer;
use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Events\TransactionCommitted;

/**
 * CUSTOMER API
 */
class CustomerController extends Controller
{
    // Displays customer details on page to 'View as customer'
    public function viewAsCustomer()
    {
        $customers = Customer::all();
        $customer_details = [];

        $now = Carbon::now();

        foreach ($customers as $customer) {
            $customer_id = $customer->id;
            $Transaction_count = 0;

            $total_spent = DB::table('purchase_transactions')
                ->join('customers', 'customers.id', '=', 'purchase_transactions.customer_id')
                ->where('customers.id', '=', $customer_id)
                ->orderBy('customers.id')
                ->sum('purchase_transactions.total_spent');

            $transactions = DB::table('purchase_transactions')
                ->join('customers', 'customers.id', '=', 'purchase_transactions.customer_id')
                ->where('customers.id', '=', $customer_id)
                ->orderBy('customers.id')
                ->get();
            
            foreach ($transactions as $transaction) {
                $transaction_time = Carbon::parse($transaction->transaction_at);
                $difference = $transaction_time->diffInDays($now);
                if ($difference < 30) {
                    $Transaction_count += 1;
                }
            }

            array_push($customer_details, [
                'customer_id' => $customer_id,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'total_spent' => $total_spent,
                'Transaction_count' => $Transaction_count
            ]);
        }

        return view('customer.view_as', [
            'customer_details' => $customer_details
        ]);
    }

    /**
    * Campaigns with fully redeemed voucher codes or is not shown
    * Also checks for end_date of campaign
    */
    public function viewCampaigns(Request $request, $customer_id)
    {
        $active_campaigns = DB::table('campaigns')
            ->join('voucher_codes', 'campaigns.id', '=', 'voucher_codes.campaign_id')
            ->select('campaigns.*')
            ->where('campaigns.active', '=', true)
            ->where('campaigns.start_date', '<=', now())
            ->where('campaigns.end_date', '>', now())
            ->where('voucher_codes.redeemed', '=', false)
            ->orderBy('campaigns.end_date', 'asc')
            ->distinct()
            ->get();
        
        return view('customer.index', [
            'active_campaigns' => $active_campaigns,
            'customer_id' => $customer_id
        ]);
    }

    /**
    * Returns to upload image or error page if conditions are not met
    */
    public function enter(Request $request, $customer_id, $campaign_id)
    {
        $Transaction_count = 0;
        $now = Carbon::now();

        $total_spent = DB::table('purchase_transactions')
            ->join('customers', 'customers.id', '=', 'purchase_transactions.customer_id')
            ->where('customers.id', '=', $customer_id)
            ->sum('purchase_transactions.total_spent');

        $transactions = DB::table('purchase_transactions')
            ->join('customers', 'customers.id', '=', 'purchase_transactions.customer_id')
            ->where('customers.id', '=', $customer_id)
            ->get();
        
        foreach ($transactions as $transaction) {
            $transaction_time = Carbon::parse($transaction->transaction_at);
            $difference = $transaction_time->diffInDays($now);
            if ($difference < 30) {
                $Transaction_count += 1;
            }
        }

        $redeemed = DB::table('customers')
            ->join('voucher_codes', 'customers.id', '=', 'voucher_codes.customer_id')
            ->where('customers.id', '=', $customer_id)
            ->count();


        if ($total_spent >= 100 AND $Transaction_count >= 3 AND $redeemed < 1) 
        {
            $voucher = DB::table('voucher_codes')
                ->join('campaigns', 'campaigns.id', '=', 'voucher_codes.campaign_id')
                ->select('voucher_codes.*')
                ->where('campaigns.id', '=', $campaign_id)
                ->where('voucher_codes.redeemed', '=', false)
                ->lockForUpdate()
                ->first();
            
            return view('customer.upload_image', [
                'voucher' => $voucher,
                'customer_id' => $customer_id
            ]);
        } else {
            return view('customer.error');
        }
    }

    /**
    * Dispatches job and updates database table if image is verified
    */
    public function process(Request $request, $customer_id, $voucher_id) 
    {
        $validation = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $verified = $request->img_verified;

        if ($verified == 'True') {
            event(new ImageUpload($voucher_id, $customer_id, $verified));
            // dispatch(new CustomerJob($voucher_id, $customer_id));
            
            return view('customer.display_voucher', [
                'verified' => $verified,
                'voucher_code' => $request->voucher_code
            ]);
        }

        return view('customer.display_voucher', ['verified' => $verified]);
    }
}
