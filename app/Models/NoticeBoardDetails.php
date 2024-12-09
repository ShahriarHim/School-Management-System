<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeBoardDetails extends Model
{
    use HasFactory;

    protected $fillable = ['description','image',  'notice_board_id', 'date'];

    public function noticeBoard()
    {
        return $this->belongsTo(NoticeBoard::class,'notice_board_id');
    }
}

