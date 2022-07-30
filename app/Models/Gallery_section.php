<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery_section extends Model
{
    use HasFactory;

    public function galleries()
    {
        return $this->hasMany(Gallery::class);  // delete and create pivot table
    }
  

}
