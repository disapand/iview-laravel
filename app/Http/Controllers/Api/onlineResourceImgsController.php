<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\onlineResourceImgs;
use App\Transformers\onlineResourceImgsTransfomer;
use App\Transformers\onlineResourceTransformer;
use Illuminate\Http\Request;

class onlineResourceImgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageUploadHandler $uploader)
    {
        $img = $request->img;
        $result = $uploader->save($img, 'online', 'o');

        $imgList = onlineResourceImgs::create([
            'url' => $result['path'],
            'online_resources_id' => $request->id,
        ]);

        return $this->response->item($imgList, new onlineResourceImgsTransfomer());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $result = $uploader->save($img, 'online', 'u');

        $imgList = onlineResourceImgs::findOrFail($request->id);
        $imgList->update([
            'url' => $result['path'],
        ]);

        return $this->response->item($imgList, new onlineResourceImgsTransfomer());
    }

    /**
     * @param onlineResourceImgs $img
     * @return \Dingo\Api\Http\Response
     * @throws \Exception
     */
    public function destroy(onlineResourceImgs $img)
    {
        $img->delete();
        $imgs = onlineResourceImgs::whereOnlineResourcesId($img->online_resources_id)->get();
        return $this->response->collection($imgs, new onlineResourceImgsTransfomer());
    }
}
