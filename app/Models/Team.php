<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

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
}
