<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use function foo\func;

class MemberController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function loginMember(Request $request)
    {
        $user = Auth::guard('member')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'isuse' => 1

        ], true);
        if ($user) {
            return redirect('/');
        } else {
            return back()->withErrors('账号/密码不正确，或者账号被锁定');
        }
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect('/');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:members',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
            'captcha' => 'required|captcha'
        ], [
            'email.unique' => '该邮箱已经被使用',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'password.required' => '请填写密码',
            'confirmPassword.confirmed' => '请填写确认密码',
            'confirmPassword.same' => '输入的密码不一致',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码'
        ]);

        $data = $request->toArray();
        $member = new Member();
        $member->email = $data['email'];
        $member->password = \Hash::make($data['password']);

        $member->save();
        Auth::guard('member')->loginUsingId($member->id);
        $message = "这是一封激活邮件";
        $to = $member->email;
        $subject = "账号激活";
        Mail::send('email.layouts', [
            'email' => $member->email,
            'token' => $member->verification_token
        ], function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
        return redirect('show');
    }

    public function show()
    {
        return view('pages.show');
    }

    public function emailVerificationRequired()
    {
        $user = Auth::guard('member')->user();
        $message = "这是一封激活邮件";
        $to = $user->email;
        $subject = "账号激活";
        Mail::send('email.layouts', [
            'email' => $user->email,
            'token' => $user->verification_token
        ], function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
        return redirect('show');
    }

    public function emailVerification($token)
    {
        $member = Member::where('verification_token', $token)->first();
        $member->update([
            'verified' => 1
        ]);
        return redirect('/');
    }

    public function member()
    {
        $member = Auth::guard('member')->user();
        return view('pages.member', compact('member'));
    }

    public function resetPassword()
    {
        $user = Auth::guard('member')->user();
        $message = "这是一封修改密码邮件";
        $to = $user->email;
        $subject = "修改密码";
        Mail::send('email.resetPassword', [
            'email' => $user->email,
            'token' => $user->verification_token
        ], function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
        return back()->withErrors('重置密码的邮件已发送至您的邮箱，请您前往邮箱查看');
    }

    public function reset($token)
    {
        $member = Member::where('verification_token', $token)->first();
        return view('pages.reset', compact('member'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'bail|required',
            'confirm_password' => 'required|same:password',
            'id' => 'required|exists:members,id'
        ], [
            'password.required' => '请输入密码',
            'confirm_password.required' => '请输入确认密码',
            'confirm_password.same' => '两次输入的密码不一致',
            'id.required' => '账号信息有误',
            'id.exists' => '账号不存在',
        ]);

        $member = Member::where('id', $request->id)->first();
        $member->update([
            'password' => \Hash::make($request->password)
        ]);

        Auth::guard('member')->logout();
        return redirect('/');
    }

    public function update(Request $request)
    {
        if( !Auth::guard('member')->check()) {
            return back()->withErrors('请登录后再进行操作');
        }

        $this->validate($request, [
            'name' => 'bail|required',
            'phone' => 'required',
            'company' => 'required',
            'address' => 'nullable'
        ], [
            'name.required' => '请输入联系人信息',
            'phone.required' => '请输入联系电话',
            'company.required' => '请输入公司'
        ]);


        $member = Auth::guard('member')->user();
        $member->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'company' => $request->company,
            'address' => $request->address
        ]);

        return back()->withErrors('信息修改成功');
    }
}
