<?php

namespace App\Http\Controllers\Api;

use App\Models\televisionResourcesImg;
use App\Transformers\televisionResourcesImgTransformer;
use Illuminate\Http\Request;

class televisionResourcesImgsController extends Controller
{
    public function index() {
        $img = televisionResourcesImg::paginate(5);
        return $this->response->paginator($img, new televisionResourcesImgTransformer());
    }

    public function delete(televisionResourcesImg $img) {
        /*
         *  根据id删除图片，同时根据被删除图片的television_resources_id获取所有该资源的图片返回
         * */
        if( $img->delete()) {
            $imgs = televisionResourcesImg::where('television_resources_id', $img->television_resources_id)->get();
            return $this->response->collection($imgs, new televisionResourcesImgTransformer());
        }
    }
}
