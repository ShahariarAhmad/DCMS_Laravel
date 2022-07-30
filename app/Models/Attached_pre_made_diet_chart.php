<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attached_pre_made_diet_chart extends Model
{
    use HasFactory;
    public function attached_pre_made_diet_charts()
    {
        return $this->belongsTo(Attached_pre_made_diet_chart::class);
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}
