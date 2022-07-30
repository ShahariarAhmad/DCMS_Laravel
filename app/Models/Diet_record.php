<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet_record extends Model
{
    use HasFactory;

    public function diets()
    {
        return $this->belongsTo(Diet::class);
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class,'transaction_id');
    }
}
