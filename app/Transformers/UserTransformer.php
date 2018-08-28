<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/8/25
 * Time: 16:58
 */

namespace App\Transformers;


use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'role' => $user->role ? : '运营者',
            'created_at' => $user->created_at->toDateTimeString(),
            'updated_at' => $user->updated_at->toDateTimeString(),
        ];
    }
}