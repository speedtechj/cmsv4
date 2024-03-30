<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collectionreport extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $guarded = [];
    protected $casts = [
        'total_price' => MoneyCast::class,
        'payment_balance' => MoneyCast::class,
        'extracharge_amount' => MoneyCast::class,
         ];
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
    public function agentdiscount()
    {
        return $this->belongsTo(Agentdiscount::class);
    }
    public function boxtype()
    {
        return $this->belongsTo(Boxtype::class);
    }
    public function servicetype()
    {
        return $this->belongsTo(Servicetype::class);
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    public function sender()
    {
        return $this->belongsTo(Sender::class);
    }
    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }
    public function senderaddress()
    {
        return $this->belongsTo(Senderaddress::class);
    }
    public function receiveraddress()
    {
        return $this->belongsTo(Receiveraddress::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function zoneprice()
    {
        return $this->belongsTo(Zoneprice::class);
    }
    public function agentprice()
    {
        return $this->belongsTo(Agentprice::class);
    }
    public function bookingpayment()
    {
        return $this->hasMany(Bookingpayment::class, 'booking_id');
    }
   
   
    public function user(){
        return $this->belongsTo(User::class);
    }
}
