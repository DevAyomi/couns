<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'consellee_id',
        'category_id',
        'request',
    ];

    public function counsellee()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
}
