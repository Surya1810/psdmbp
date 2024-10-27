<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function movements()
    {
        return $this->hasMany(DocumentMovement::class);
    }

    public function currentDepartment()
    {
        return $this->belongsTo(Department::class, 'to_department_id');
    }

    protected static function booted()
    {
        // When a document is created or updated, set the RFID tag status to "used"
        static::saving(function ($document) {
            if ($document->tag_id) {
                $Tag = Tag::find($document->tag_id);
                if ($Tag && $Tag->status !== 'used') {
                    $Tag->update(['status' => 'used']);
                }
            }
        });

        // When a document is deleted, set the RFID tag status to "available"
        static::deleting(function ($document) {
            if ($document->Tag) {
                $document->Tag->update(['status' => 'available']);
            }
        });
    }
}
