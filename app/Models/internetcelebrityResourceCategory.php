<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class internetcelebrityResourceCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function internetcelerityResource() {
        return $this->belongsToMany(internetcelebrityResource::class, 'category_internetcelerities',
            'internetcelerity_resources_catetory_id', 'internetcelerity_resources_id');
    }
}
