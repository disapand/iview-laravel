<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\onlineResourceImgs
 *
 * @property int $id
 * @property int|null $online_resources_id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\onlineResource|null $onlineResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResourceImgs onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereOnlineResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResourceImgs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResourceImgs withoutTrashed()
 * @mixin \Eloquent
 */
class onlineResourceImgs extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function onlineResource() {
        return $this->belongsTo(onlineResource::class, 'online_resources_id', 'id');
    }
}
