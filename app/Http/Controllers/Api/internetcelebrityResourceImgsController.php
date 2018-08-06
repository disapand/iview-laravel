<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\internetcelebrityResourceImgs;
use App\Transformers\internetcelebrityResourceImgsTransformer;
use Illuminate\Http\Request;

class internetcelebrityResourceImgsController extends Controller
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
        try {
            $img = $request->img;
            $result = $uploader->save($img, 'internetcelebrity', 'i');

            $imgList = internetcelebrityResourceImgs::create([
                'url' => $result['path'],
                'internetcelebrity_resources_id' => $request->id,
            ]);

            return $this->response->item($imgList, new internetcelebrityResourceImgsTransformer());
        } catch (\Exception $exception) {
            return $exception;
        }
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
        $result = $uploader->save($img, 'internetcelebrity', 'u');

        $imgList = internetcelebrityResourceImgs::findOrFail($request->id);
        $imgList->update([
            'url' => $result['path'],
        ]);

        return $this->response->item($imgList, new internetcelebrityResourceImgsTransformer());
    }

    /**
     * @param internetcelebrityResourceImgs $img
     * @return \Dingo\Api\Http\Response
     * @throws \Exception
     */
    public function destroy(internetcelebrityResourceImgs $img)
    {
        $img->delete();
        $imgs = internetcelebrityResourceImgs::whereInternetcelebrityResourcesId($img->internetcelebrity_resources_id)->get();
        return $this->response->collection($imgs, new internetcelebrityResourceImgsTransformer());
    }
}
