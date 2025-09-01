<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parroquia;

class Comuna extends Model
{
    use HasFactory;
    
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
}
