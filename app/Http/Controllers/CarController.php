<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;

class CarController extends Controller
{
    use Helpers;

    public function index() {
        return '123';
    }
}
