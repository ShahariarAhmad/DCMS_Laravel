<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['image_url'];
    public function banners()
    {
        return $this->hasOne(Banner::class);
    }

    public function events()
    {
        return $this->hasOne(Event::class);
    }

    public function gallery_sections()
    {
        return $this->belongsTo(Gallery_section::class);
    }
}
