<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentMovement extends Model
{
    protected $fillable = ['document_id', 'from_department_id', 'to_department_id', 'moved_at'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function fromDepartment()
    {
        return $this->belongsTo(Department::class, 'from_department_id');
    }

    public function toDepartment()
    {
        return $this->belongsTo(Department::class, 'to_department_id');
    }
}
