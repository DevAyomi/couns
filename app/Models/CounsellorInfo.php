<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellorInfo extends Model
{
    use HasFactory;

    public function counsellor()
    {
        $this->belongsTo(User::class)->withDefault();
    }
}
