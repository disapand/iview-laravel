<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\newspaperResource;
use App\Models\newspaperResourceImg;
use App\Transformers\newspaperResourceImgsTransformer;
use App\Transformers\newspaperResourceTransformer;
use Illuminate\Http\Request;

class newspapperResourceImsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = newspaperResource::where([])->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($news, new newspaperResourceTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @param ImageUploadHandler $uploader
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request, ImageUploadHandler $uploader)
    {
        $img = $request->img;
        $result = $uploader->save($img, 'newspaper', 'n');

        $imgList = newspaperResourceImg::create([
            'newspaper_resources_id' => $request->id,
            'url' => $result['path']
        ]);

        return $this->response->item($imgList, new newspaperResourceImgsTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param  newspaperResource  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function show(newspaperResource $newspaper) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageUploadHandler $uploader)
    {
        $img = $request->img;
        $result = $uploader->save($img, 'newspaper', 'u');

        $imgList = newspaperResourceImg::findOrFail($request->id);
        $imgList->update([
            'url' => $result['path']
        ]);

        return $this->response->item($imgList, new newspaperResourceImgsTransformer());
    }

    /**
     * @param newspaperResourceImg $img
     * @return \Dingo\Api\Http\Response
     * @throws \Exception
     */
    public function destroy(newspaperResourceImg $img)
    {
        $img->delete();
        $imgs = newspaperResourceImg::whereNewspaperResourcesId($img->newspaper_resources_id)->get();
        return $this->response->collection($imgs, new newspaperResourceImgsTransformer());
    }
}
