<?php

namespace App\Models;

use App\Models\MasterSettings\Designation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExecutiveCommittee extends Model
{
    use SoftDeletes;
    const EXECUTIVE_PATH = 'uploads/executiveCommittee';

    protected $fillable =
        [
            'full_name',
            'designation_id',
            'address',
            'contact_number',
            'contact_email',
            'facebook_link',
            'facebook_link_status',
            'twitter_link',
            'twitter_link_status',
            'insta_link',
            'insta_link_status',
            'linkedin_link',
            'linkedin_link_status',
            'linkedin_link_status',
            'order',
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

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
}
