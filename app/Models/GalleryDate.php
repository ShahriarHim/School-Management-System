<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryDate extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id', 'date'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}

