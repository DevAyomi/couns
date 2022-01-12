<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


     protected $fillable = [
        'category',
        'user_id',
        'username',
        'imgpath',
    ];

    public function booking(){
        return $this->hasOne('Booking');
    }
}
