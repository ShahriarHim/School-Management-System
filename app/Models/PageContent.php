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

    public function user(){
        return $this->belongsTo(User::class); //User::class,'user_id','id'
    }

    public function pageContentDetail(){
        return $this->hasOne(PageContentDetail::class);
    }
}
