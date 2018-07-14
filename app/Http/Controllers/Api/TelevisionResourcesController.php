<?php

namespace App\Http\Controllers\Api;

use App\Models\televisionResources;
use App\Transformers\televisionResourcesTransformer;
use Illuminate\Http\Request;

class TelevisionResourcesController extends Controller
{
    public function index() {

    }

    public function tv() {
        $tv = televisionResources::paginate(15);
        return $this->response->paginator($tv, new televisionResourcesTransformer());
    }

    public function getTv(televisionResources $tv) {
        return $this->response->item($tv, new televisionResourcesTransformer());
    }

}
