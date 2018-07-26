<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\outdoorResourceImgs
 *
 * @property-read \App\Models\outdoorResource $outdoorResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResourceImgs onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResourceImgs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResourceImgs withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $outdoor_resources_id 对应的户外资源
 * @property string $url 图片的地址
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereOutdoorResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereUrl($value)
 */
class outdoorResourceImgs extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'outdoor_resources_id', 'url'
    ];

    public function outdoorResource() {
        return $this->belongsTo(outdoorResource::class, 'outdoor_resources_id', 'id');
    }

}
