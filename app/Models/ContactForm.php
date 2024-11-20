<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_name',
        'date',
        'status',
        'image',
        'description'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
