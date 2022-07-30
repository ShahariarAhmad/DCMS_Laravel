<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function transcation()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function handler()
    {
        return $this->hasOne(Handler::class);
    }
    public function chamber()
    {
        return $this->hasOne(Chamber::class);
    }

    public function chambers()
    {
        return $this->belongsTo(Chamber::class);
    }

    public function handlers()
    {
        return $this->belongsTo(Handler::class);
    }
}
