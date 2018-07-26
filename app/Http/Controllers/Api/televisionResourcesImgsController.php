<?php

namespace App\Http\Controllers\Api;

use App\Models\televisionResources;
use App\Models\televisionResourcesImg;
use App\Transformers\televisionResourcesImgTransformer;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;

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
            if (isset($img->television_resources_id)) {
                $imgs = televisionResourcesImg::where('television_resources_id', $img->television_resources_id)->get();
                return $this->response->collection($imgs, new televisionResourcesImgTransformer());
            }
        }
    }

    public function store(Request $request, ImageUploadHandler $uploader) {

        $img = $request->img;
        $result = $uploader->save($img, 'television', 't');
        /*
         *  同时提交了id和televisionResourcesImgs，表示需要新增图片
         *  只提交了id，表示需要对图片进行更新
         *  只提交了televisionResourcesImgs表示图片为新增的
         * */
        if (isset($request->id) && ! $request->has('televisionResourcesImgs')) {
            $imgList = televisionResourcesImg::findOrFail($request->id);
            $imgList->update([
                'url' => $result['path']
            ]);
        } else {
            $imgList = televisionResourcesImg::create([
                'url' => $result['path'],
                'television_resources_id' => $request->id,
            ]);
        }
        return $this->response->item($imgList, new televisionResourcesImgTransformer());
    }
}
