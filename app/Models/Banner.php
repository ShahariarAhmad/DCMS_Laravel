<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
protected $guarded = ['id'];
    public function galleries()
    {
        return $this->belongsTo(Gallery::class);
    }
}
