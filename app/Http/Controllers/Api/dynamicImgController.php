<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\dynamic;
use App\Models\dynamicImg;
use App\Transformers\dynamicImgTransformer;
use Illuminate\Http\Request;

class dynamicImgController extends Controller
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
        $result = $uploader->save($img, 'dynamic', 'd');

        $imgList = dynamicImg::create([
            'url' => $result['path'],
            'dynamic_id' => $request->id,
        ]);

        return $this->response->item($imgList, new dynamicImgTransformer());

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
        $result = $uploader->save($img, 'dynamic', 't');
        try {
            $imgList = dynamicImg::findOrFail($request->id);
            $imgList->update([
                'url' => $result['path'],
            ]);
            return $this->response->item($imgList, new dynamicImgTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(dynamicImg $img)
    {
        try {
            $img->delete();
            $imgList = dynamicImg::whereDynamicId($img->dynamic_id)->get();
            return $this->response->collection($imgList, new dynamicImgTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }
}