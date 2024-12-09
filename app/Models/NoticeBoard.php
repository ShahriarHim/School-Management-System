<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeBoard extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'created_by'];

    public function details()
    {
        return $this->hasOne(NoticeBoardDetails::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}

