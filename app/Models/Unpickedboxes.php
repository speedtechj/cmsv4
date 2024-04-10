<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unpickedboxes extends Model
{
    use HasFactory;
    protected $table = 'bookings';
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
    
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    

}
