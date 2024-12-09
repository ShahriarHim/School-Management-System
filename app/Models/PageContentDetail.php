<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContentDetail extends Model
{
    use HasFactory;
    public function pageContent(){
        return $this->belongsTo(PageContent::class);
    }
}
