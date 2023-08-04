<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;
    protected $fillable = ['message','chat_id'];

    public function chat()
    {
        return $this->belongsTo(Chat::class,'chat_id');
    }
}
