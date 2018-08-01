<?php

namespace App\Http\Controllers\Api;

use App\Models\newspaperResource;
use App\Models\newspaperResourceImg;
use App\Transformers\newspaperResourceTransformer;
use Illuminate\Http\Request;

class newspapperResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newspapers = newspaperResource::where([])->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($newspapers, new newspaperResourceTransformer());
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
    public function store(Request $request)
    {
        $data = $request->toArray();
        $imgs = $data['newspaperResourceImgs'];
        unset($data['newspaperResourceImgs'], $data['created_at'], $data['updated_at'], $data['deleted_at']);
        if ($data['id']) {
            newspaperResource::findOrFail($data['id'])->update($data);
        } else {
            $newspaper = newspaperResource::create($data);
            foreach ($imgs['data'] as $img) {
                newspaperResourceImg::findOrFail($img['id'])->update([
                    'newspaper_resources_id' => $newspaper->id,
                ]);
            }
        }

        return $this->response->created();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(newspaperResource $newspaper)
    {
        return $this->response->item($newspaper, new newspaperResourceTransformer());
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(newspaperResource $newspaper)
    {
        $newspaper->delete();
        newspaperResourceImg::whereNewspaperResourcesId($newspaper->id)->delete();
        return $this->response->paginator(newspaperResource::where([])->paginate(15), new newspaperResourceTransformer());
    }

    public function query($condition, $query) {
        $newspapers = newspaperResource::where($condition, 'like', "%$query%")->paginate(15);
        return $this->response->paginator($newspapers, new newspaperResourceTransformer());
    }

}
