<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    const PARTNER_ICON_PATH = 'uploads/partners';

    protected $fillable =
        [
            'type_id',
            'name',
            'icon_image',
            'created_date',
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
