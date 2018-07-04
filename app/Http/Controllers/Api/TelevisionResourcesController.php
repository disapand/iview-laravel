<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class TelevisionResourcesController extends Controller
{
    public function index() {
        $selector = [
            [
                'label' => '第一版',
                'value' => 'v1',
            ],
            [
                'label' => '第二版',
                'value' => 'v2',
            ],
            [
                'label' => '第三版',
                'value' => 'v3',
            ],
        ];

        return $this->response->array($selector);
    }
}
