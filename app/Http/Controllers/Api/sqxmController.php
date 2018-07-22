<?php

namespace App\Http\Controllers\Api;

use App\Models\sqxm;
use App\Transforms\sqxmTransformer;
use Illuminate\Http\Request;

class sqxmController extends Controller
{
    public function index() {
        $sqxms = sqxm::paginate(15);
        return $this->response->paginator($sqxms, new sqxmTransformer());
    }
}
