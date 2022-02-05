<?php

namespace App\Listeners;

use App\Events\ImageUpload;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class ImageVerified
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ImageUpload $event)
    {
        DB::table('voucher_codes')
            ->where('id', '=', $event->voucherId)
            ->lockForUpdate()
            ->update([
                'customer_id' => $event->customerId,
                'redeemed' => true
            ]);
        
    /**
     * Error with passing in of arguements
     * 
     */
        // $voucherId = $event->voucherId;
        // $customerId = $event->customerId;
        // try {
        //     DB::transaction(function($voucherId, $customerId) {
        //         DB::table('voucher_codes')
        //         ->where('id', '=', $voucherId)
        //         ->lockForUpdate()
        //         ->update([
        //             'customer_id' => $customerId,
        //             'redeemed' => true
        //         ]);
        //         DB::commit();
        //     });
        // } catch (Exception $e) {
        //     DB::rollback();
        // }
    }
}
