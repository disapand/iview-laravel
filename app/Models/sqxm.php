<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\sqxm
 *
 * @property int $id
 * @property string $name
 * @property string|null $range
 * @property string|null $expanded
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\kzlx[] $kzlx
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\sqxm onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\sqxm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\sqxm whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\sqxm whereExpanded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\sqxm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\sqxm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\sqxm whereRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\sqxm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\sqxm withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\sqxm withoutTrashed()
 * @mixin \Eloquent
 */
class sqxm extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id', 'updated_at', 'created_at', 'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    public function kzlx() {
        return $this->belongsToMany('App\Models\kzlx', 'kzlx_sqxm', 'sqxm_id', 'kzlx_id');
    }
}
