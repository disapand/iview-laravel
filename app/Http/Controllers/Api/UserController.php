<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Auth;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me()
    {
        return $this->response->item($this->user, new UserTransformer());
    }

    public function index()
    {
        $users = User::where([])->orderby('id', 'desc')->paginate();
        return $this->response->paginator($users, new UserTransformer());
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            $users = User::where([])->orderby('id', 'desc')->paginate();
            return $this->response->paginator($users, new UserTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }
}
