<?php

namespace App\Http\Controllers\Api;

use App\Models\outdoorResource;
use App\Transformers\outdoorResourceTransformer;
use Illuminate\Http\Request;

class outdoorResourceController extends Controller
{

    public function index() {
        $outdoors = outdoorResource::where([])->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($outdoors, new outdoorResourceTransformer());
    }

}
