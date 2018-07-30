<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\transformResourceImg;
use App\Transformers\transformResourceImgsTransform;
use Illuminate\Http\Request;

class transformImgsController extends Controller
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
    public function create(Request $request, ImageUploadHandler $uploader)
    {
        $img = $request->img;
        $result = $uploader->save($img, 'transform', 't');

        $imgList = transformResourceImg::create([
            'transform_resources_id' => $request->id,
            'url' => $result['path'],
        ]);

        return $this->response->item($imgList, new transformResourceImgsTransform());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $result = $uploader->save($img, 'transform', 't');

        $tmp = transformResourceImg::findOrFail($request->id);
        $tmp->update([
            'url' => $result['path'],
        ]);

        return $this->response->item($tmp, new transformResourceImgsTransform());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(transformResourceImg $img)
    {
        $img->delete();
        $imgs = transformResourceImg::whereTransformResourcesId($img->transform_resources_id)->get();
        return $this->response->collection($imgs, new transformResourceImgsTransform());
    }
}
