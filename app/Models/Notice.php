<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;
    const NOTICE_PATH = 'uploads/notices';

    protected $fillable =
        [
            'title',
            'descriptions',
            'file',
            'order',
            'published_date',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
            'is_highlight_notice'
        ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
