<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function department()
    {
        return $this->hasOne(Department::class);
    }
}
