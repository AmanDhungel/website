<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;
    const PROGRAM_FILE_PATH = 'uploads/programs';

    protected $fillable =
        [
            'type_id',
            'title',
            'description',
            'start_date',
            'end_date',
            'image',
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
