<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Auth;
use App\Http\Requests\Api\AuthorizationsRequest;
use Illuminate\Http\Request;

class AuthorizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param AuthorizationsRequest $request
     */
    public function store(AuthorizationsRequest $request)
    {
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if ( User::whereName($request->name)->count() <= 0 )
            return $this->response->errorUnauthorized('账号已被禁用');

        if (! $token = Auth::guard('api')->attempt($data))
        {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $token = Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }

    /**
     * @return \Dingo\Api\Http\Response
     */
    public function destroy()
    {
        Auth::guard('api')->logout();
        return $this->response->noContent();
    }

    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
