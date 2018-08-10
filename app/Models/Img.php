<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Img
 *
 * @property int $id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Img onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Img withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Img withoutTrashed()
 * @mixin \Eloquent
 */
class Img extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];
}
