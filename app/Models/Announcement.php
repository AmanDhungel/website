<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use SoftDeletes;
    const FILE_PATH = 'uploads/announcements';

    protected $fillable =
        [
            'type_id',
            'title',
            'description',
            'created_date',
            'announcement_file',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
        ];

    public function type(){
        return $this->belongsTo(PartnerType::class,'type_id');
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
