<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\transformResourceImg
 *
 * @property int $id
 * @property int|null $transform_resources_id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\transformResource|null $transformResource
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereTransformResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereUrl($value)
 * @mixin \Eloquent
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResourceImg onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResourceImg withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResourceImg withoutTrashed()
 */
class transformResourceImg extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function transformResource() {
        return $this->belongsTo(transformResource::class, 'transform_resources_id', 'id');
    }

}
