<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
use App\Models\newspaperResource;
use App\Models\newspaperResourceImg;
use App\Transformers\newspaperResourceTransformer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
     * @param newspaperResource $newspaper
     * @return \Dingo\Api\Http\Response
     * @throws \Exception
     */
    public function destroy(newspaperResource $newspaper)
    {
        $newspaper->delete();
        newspaperResourceImg::whereNewspaperResourcesId($newspaper->id)->delete();
        return $this->response->paginator(newspaperResource::orderBy('id', 'desc')->paginate(15), new newspaperResourceTransformer());
    }

    public function deleteSelection( $list )
    {
        $deleteList = explode('-', $list);
        foreach ($deleteList as $id) {
            $newspaper = newspaperResource::find($id);
            $newspaper->delete();
            newspaperResourceImg::whereNewspaperResourcesId($id)->delete();
        }
        return $this->response->paginator(newspaperResource::orderBy('id', 'desc')->paginate(15), new newspaperResourceTransformer());
    }

    public function query($condition, $query) {
        $newspapers = newspaperResource::where($condition, 'like', "%$query%")->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($newspapers, new newspaperResourceTransformer());
    }

    public function importNewspaper(Request $request, ExcelUploadHandler $uploader) {
        try {
            $excel = $request->file('excel');
            $result = $uploader->save($excel, 'newspaper');

            $data = Excel::load($result['path'], function ($reader){})->get();
            newspaperResource::insert($data->toArray());
            return $this->response->paginator(newspaperResource::where([])->orderBy('id', 'desc')->paginate(15),
                new newspaperResourceTransformer());
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function publish(newspaperResource $newspaper)
    {
        $published = $newspaper->isuse ? true : false;
        $newspaper->update(['isuse' => ! $published]);
        return 'success';
    }

    public function cancelSelection($list)
    {
        $cancelList = explode('-', $list);
        foreach ($cancelList as $id) {
            $newspaper = newspaperResource::find($id);
            $newspaper->update(['isuse' => false]);
        }
        return 'success';
    }

    public function publishedSelection($list)
    {
        $cancelList = explode('-', $list);
        foreach ($cancelList as $id) {
            $newspaper = newspaperResource::find($id);
            $newspaper->update(['isuse' => true]);
        }
        return 'success';
    }

}
