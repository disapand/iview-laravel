<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\outdoorResourceImgs;
use App\Transformers\outdoorResourceImgsTransformer;
use Illuminate\Http\Request;

class outdoorResourceImgController extends Controller
{

    public function store(Request $request, ImageUploadHandler $uploader)
    {
        $img = $request->img;
        $result = $uploader->save($img, 'outdoor', 'o');

        $imgList = outdoorResourceImgs::create([
            'outdoor_resources_id' => $request->id,
            'url' => $result['path']
        ]);

        return $this->response->item($imgList, new outdoorResourceImgsTransformer());
    }

    public function delete(outdoorResourceImgs $img)
    {
        $img->delete();
        $imgs = outdoorResourceImgs::where('outdoor_resources_id', $img->outdoor_resources_id)->get();
        return $this->response->collection($imgs, new outdoorResourceImgsTransformer());
    }

    public function update(Request $request, ImageUploadHandler $uploader) {

        $img = $request->img;
        $result = $uploader->save($img, 'outdoor', 'o');

        $tmp = outdoorResourceImgs::findOrFail($request->id);
        $tmp->update([
            'url' => $result['path']
        ]);

        return $this->response->item($tmp, new outdoorResourceImgsTransformer());
    }

}
