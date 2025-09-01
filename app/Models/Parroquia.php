<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;

class Parroquia extends Model
{
    use HasFactory;
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}
