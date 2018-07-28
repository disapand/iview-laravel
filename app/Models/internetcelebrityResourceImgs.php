<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\internetcelebrityResourceImgs
 *
 * @property int $id
 * @property int|null $internetcelebrity_resources_id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\internetcelebrityResource|null $internetcelerityResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceImgs onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereInternetcelebrityResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceImgs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceImgs withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\internetcelebrityResource|null $internetbrityResouce
 */
class internetcelebrityResourceImgs extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function internetbrityResouce() {
        return $this->belongsTo(internetcelebrityResource::class, 'internetcelebrity_resources_id', 'id');
    }
}
