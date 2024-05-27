<?php

namespace App\Models;

use App\Models\Scopes\UnloadedScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
#[ScopedBy([UnloadedScope::class])]
class Unloadedwarehouse extends Model
{
    use HasFactory;
    protected $table = 'invoicestatuses';

   
    
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function trackstatus()
    {
        return $this->belongsTo(Trackstatus::class);
    }
}
