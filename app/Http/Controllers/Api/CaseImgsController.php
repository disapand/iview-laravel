<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\CaseImg;
use App\Transformers\CaseImgTransformer;
use Illuminate\Http\Request;

class CaseImgsController extends Controller
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
        $result = $uploader->save($img, 'case', 'c');

        $imgList =CaseImg::create([
            'url' => $result['path'],
            'case_resources_id' => $request->id,
        ]);

        return $this->response->item($imgList, new CaseImgTransformer());
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
        try {
            $img = $request->img;
            $result = $uploader->save($img, 'case', 'u');

            $imgList = CaseImg::findOrFail($request->id);
            $imgList->update([
                'url' => $result['path']
            ]);

            return $this->response->item($imgList, new CaseImgTransformer());
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
    public function destroy(CaseImg $img)
    {
        try {
            $img->delete();
            $imgList = CaseImg::whereCaseResourcesId($img->case_resources_id)->get();
            return $this->response->collection($imgList, new CaseImgTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }
}
