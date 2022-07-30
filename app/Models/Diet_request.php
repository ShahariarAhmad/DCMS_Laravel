<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet_request extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}
