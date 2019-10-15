<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/8/25
 * Time: 16:58
 */

namespace App\Transformers;


use App\Models\Member;
use League\Fractal\TransformerAbstract;

class MemberTransformer extends TransformerAbstract
{
    public function transform(Member $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'phone' => $user->phone,
            'email' => $user->email,
            'sex' => $user->sex,
            'address' => $user->address,
            'deleted_at' => $user->deleted_at ? $user->deleted_at->toDateTimeString() : '',
            'created_at' => $user->created_at ? $user->created_at->toDateTimeString() : '',
            'updated_at' => $user->updated_at ? $user->updated_at->toDateTimeString() : '',
        ];
    }
}