<?php

namespace App\Http\Controllers\Api;

use App\Models\Member;
use App\Transformers\MemberTransformer;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return $this->response->collection($member, new MemberTransformer());
    }

    public function store(Request $request)
    {
        $data = $request->toArray();

        if(array_key_exists('password', $data) && $data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            return json_encode('请输入正确的密码');
        }

        $member = Member::where('phone', $data['phone'])->orWhere('email', $data['email'])->get();
        if(count($member) != 0) {
            return $member[0];
        } else {
            $member = Member::create($data);
        }

        return $this->response->item($member, new MemberTransformer());
    }

    public function delete(Member $member)
    {
        try {
            $member->delete();
            return json_encode('删除成功');
        } catch (Exception $exception) {
            return json_encode(['删除失败' => $exception]);
        }
    }
}
