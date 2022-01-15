<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Chat extends Model
{
    use HasFactory;

     protected $fillable = [
        'counsellee_id',
        'counsellor_id'
    ];

    public function counsellor(){
      return $this->belongsTo(User::class, 'counsellor_id');
    }

     public function counsellee(){
      return $this->belongsTo(User::class, 'counsellee_id');
     }
}
