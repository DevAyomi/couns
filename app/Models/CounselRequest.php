<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselRequest extends Model
{
    use HasFactory;

    public function counsellee()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'consellee_id',
        'category_id',
        'request',
    ];
}
