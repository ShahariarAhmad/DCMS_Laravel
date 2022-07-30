<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pre_made_diet_chart extends Model
{
    use HasFactory;
    public function pre_made_diet_charts()
    {
        return $this->hasMany(Notes_From_Doctor::class);
    }
    public function pre_made_diet()
    {
    return $this->belongsTo(Pre_made_diet_chart::class);
    }
}
