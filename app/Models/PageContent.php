<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'title',
        'button',
        'title2',
        'image',
        'content'
    ];

/*     public function user(){
        return $this->hasOne(user::class,'user_id','id');
    } */
}
