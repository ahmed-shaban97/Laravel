<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // علشان اقدر اعمله فاكتوري

class Post extends Model
{
    use HasFactory; // ونستخدمه هنا
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}