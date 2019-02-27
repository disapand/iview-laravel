<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
use App\Models\onlineResource;
use App\Models\onlineResourceImgs;
use App\Transformers\onlineResourceTransformer;
use App\Transformers\outdoorResourceTransformer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class onlineResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onlines = onlineResource::where([])->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($onlines, new onlineResourceTransformer());
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
        $imgs = $data['onlineResourceImgs'];
        unset($data['onlineResourceImgs'], $data['created_at'], $data['updated_at'], $data['deleted_at']);

        try {
            if ($data['id']) {
                onlineResource::findOrFail($data['id'])->update($data);
            } else {
                $online = onlineResource::create($data);
                foreach ($imgs['data'] as $img) {
                    onlineResourceImgs::findOrFail($img['id'])->update([
                        'online_resources_id' => $online->id,
                    ]);
                }
            }

            return $this->response->created();
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * @param onlineResource $online
     * @return \Dingo\Api\Http\Response
     */
    public function show(onlineResource $online)
    {
        return $this->response->item($online, new onlineResourceTransformer());
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
     * @param onlineResource $online
     * @return \Dingo\Api\Http\Response
     * @throws \Exception
     */
    public function destroy(onlineResource $online)
    {
        $online->delete();
        onlineResourceImgs::whereOnlineResourcesId($online->id)->delete();
        return $this->response->paginator(onlineResource::orderBy('id', 'desc')->paginate(15), new onlineResourceTransformer());
    }

    public function deleteSelection( $list )
    {
        $deleteList = explode('-', $list);
        foreach ($deleteList as $id) {
            $online = onlineResource::find($id);
            $online->delete();
            onlineResourceImgs::whereOnlineResourcesId($id)->delete();
        }
        return $this->response->paginator(onlineResource::orderBy('id', 'desc')->paginate(15), new onlineResourceTransformer());
    }

    public function query($condition, $query) {
        $online = onlineResource::where($condition, 'like', "%$query%")->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($online, new onlineResourceTransformer());
    }

    public function importOnline(Request $request, ExcelUploadHandler $uploader) {
        try {
            $excel = $request->file('excel');
            $result = $uploader->save($excel, 'online');

            $data = Excel::load($result['path'], function ($reader){})->get();
            onlineResource::insert($data->toArray());
            return $this->response->paginator(onlineResource::where([])->orderBy('id', 'desc')->paginate(15),
                new onlineResourceTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function publish(onlineResource $online)
    {
        $published = $online->isuse ? true : false;
        $online->update(['isuse' => ! $published]);
        return 'success';
    }

    public function cancelSelection($list)
    {
        $cancelList = explode('-', $list);
        foreach ($cancelList as $id) {
            $online = onlineResource::find($id);
            $online->update(['isuse' => false]);
        }
        return 'success';
    }

    public function publishedSelection($list)
    {
        $cancelList = explode('-', $list);
        foreach ($cancelList as $id) {
            $online = onlineResource::find($id);
            $online->update(['isuse' => true]);
        }
        return 'success';
    }

}
