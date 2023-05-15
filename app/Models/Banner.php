<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    const BANNER_PATH = 'uploads/banners';

    protected $fillable =
        [
            'header_title',
            'main_title',
            'main_title',
            'description',
            'image',
            'order',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
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
