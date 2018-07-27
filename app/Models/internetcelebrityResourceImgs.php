<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class internetcelebrityResourceImgs extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function internetcelerityResource() {
        return $this->belongsTo(internetcelebrityResource::class, 'internetcelebrity_resources_id', 'id');
    }
}
