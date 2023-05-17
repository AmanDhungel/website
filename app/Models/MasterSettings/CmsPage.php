<?php

namespace App\Models\MasterSettings;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPage extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'page_name',
            'page_code',
            'order',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
            'is_header_menu',
            'parent_id',
            'page_link',
        ];

    public function children(): HasMany
    {
        return $this->hasMany(CmsPage::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(CmsPage::class, 'parent_id')->where('parent_id', 0)->with('parent');
    }
}
