<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function documents()
    {
        return $this->hasManyThrough(Document::class, DocumentMovement::class, 'to_department_id', 'id', 'id', 'document_id');
    }
}
