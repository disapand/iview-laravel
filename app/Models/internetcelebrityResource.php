<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class internetcelebrityResource extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function internetcelerityResourcImgs() {
        return $this->hasMany(internetcelebrityResourceImgs::class, 'internetcelebrity_resources_id', 'id');
    }

    public function internetcelerityResourceCategory() {
        return $this->belongsToMany(internetcelebrityResourceCategory::class, 'category_internetcelerities',
            'internetcelerity_resources_id', 'internetcelerity_resources_category_id');
    }
}
