<?php

namespace App\Http\Controllers\Api;

use App\Models\televisionResources;
use App\Transformers\televisionResourcesTransformer;
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

    public function tv() {
        $tv = televisionResources::all();
        return $this->response->collection($tv, new televisionResourcesTransformer());
    }

    public function getTv(televisionResources $tv) {
        return $this->response->item($tv, new televisionResourcesTransformer());
    }

}
