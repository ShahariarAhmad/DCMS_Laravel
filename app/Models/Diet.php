<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $guarded = ['id'];
    public function Diet_records()
    {
        return $this->hasMany(Diet_record::class);
    }

    public function diets()
    {
        return $this->belongsTo(Diet::class);
    }
}
