<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\kzlx
 *
 * @property int $id
 * @property string $category
 * @property int $isuse
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\sqxm[] $sqxm
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\kzlx onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\kzlx whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\kzlx whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\kzlx whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\kzlx whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\kzlx whereIsuse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\kzlx whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\kzlx withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\kzlx withoutTrashed()
 * @mixin \Eloquent
 */
class kzlx extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id', 'updated_at', 'created_at', 'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    public function sqxm() {
        return $this->belongsToMany('App\Models\sqxm', 'kzlx_sqxm', 'kzlx_id', 'sqxm_id');
    }

}
