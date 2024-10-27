<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function tag()
    {
        return $this->hasOne(Tag::class);
    }

    public function movements()
    {
        return $this->hasMany(DocumentMovement::class);
    }

    public function currentDepartment()
    {
        return $this->belongsTo(Department::class, 'to_department_id');
    }
}
