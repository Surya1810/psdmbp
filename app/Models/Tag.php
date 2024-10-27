<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}