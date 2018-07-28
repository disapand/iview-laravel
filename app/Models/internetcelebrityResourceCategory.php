<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\internetcelebrityResourceCategory
 *
 * @property int $id
 * @property int|null $internetcelebrity_resources_id
 * @property string $name
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\internetcelebrityResource[] $internetcelerityResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereInternetcelebrityResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceCategory withoutTrashed()
 * @mixin \Eloquent
 */
class internetcelebrityResourceCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function internetcelerityResource() {
        return $this->belongsToMany('App\Models\internetcelebrityResource', 'category_internetcelerities',
            'internetcelebrity_resources_category_id', 'internetcelerity_resources_id');
    }
}
