<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index() {

        return $this->response->array([
            [
                'label' => '版本1',
                'value' => 'v1'
            ],
            [
                'label' => '版本2',
                'value' => 'v2'
            ],
            [
                'label' => '版本3',
                'value' => 'v3'
            ],
        ]);
    }
}
