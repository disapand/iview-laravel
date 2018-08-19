<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\dynamicImg
 *
 * @property-read \App\Models\dynamic $dynamic
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamicImg onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamicImg withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamicImg withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $dynamic_id
 * @property string|null $url
 * @property string|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamicImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamicImg whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamicImg whereDynamicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamicImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamicImg whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamicImg whereUrl($value)
 */
class dynamicImg extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted__at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function dynamic() {
        return $this->belongsTo(dynamic::class, 'dynamic_id', 'id');
    }
}
