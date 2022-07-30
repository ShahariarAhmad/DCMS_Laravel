<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes_from_doctor extends Model
{
    use HasFactory;

    public function pre_made_diet_charts()
    {
        return $this->hasMany(Pre_made_diet_chart::class);
    }

    public function diets()
    {
        return $this->hasMany(Diet::class);
    }
}
