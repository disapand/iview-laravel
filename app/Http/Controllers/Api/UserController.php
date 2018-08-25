<?php

namespace App\Http\Controllers\Api;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me()
    {
        return $this->response->item($this->user, new UserTransformer());
    }
}
