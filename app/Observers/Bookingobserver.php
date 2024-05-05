<?php

namespace App\Observers;

use App\Models\Booking;
use App\Models\Skiddinginfo;
use Filament\Notifications\Notification;

class Bookingobserver
{
    /**
     * Handle the Booking "created" event.
     */
    public function created(Booking $booking): void
    {
        $lastbooking = Booking::orderBy('booking_invoice', 'desc')->first();


        $skiddingresult = Skiddinginfo::where('virtual_invoice', $booking->booking_invoice)
            ->orWhere('virtual_invoice', $booking->manual_invoice);
            if($skiddingresult->exists()){
                $skiddingresult->update(
                    [
                        'boxtype_id' => $booking->boxtype_id,
                        'is_encode' => true,
                        'booking_id' => $booking->id
                    ]
                );
            }
        // $skiddingresult->update(
        //     [
        //         'boxtype_id' => $booking->boxtype_id,
        //         'is_encode',
        //         true,
        //         'booking_id' => $booking->id
        //     ]
        // );
    }

    /**
     * Handle the Booking "updated" event.
     */
    public function updated(Booking $booking): void
    {

    }

    /**
     * Handle the Booking "deleted" event.
     */
    public function deleted(Booking $booking): void
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     */
    public function restored(Booking $booking): void
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     */
    public function forceDeleted(Booking $booking): void
    {
        //
    }
}
