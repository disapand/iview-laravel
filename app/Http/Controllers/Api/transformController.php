<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
use App\Imports\ResourceImport;
use App\Models\transformResource;
use App\Models\transformResourceImg;
use App\Transformers\transformResourceTransformer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class transformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transforms = transformResource::where([])->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($transforms, new transformResourceTransformer());
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->toArray();
        $imgs = $data['transformResourceImgs'];
        unset($data['transformResourceImgs'], $data['created_at'], $data['updated_at'], $data['deleted_at']);
        if ($data['id']) {
            transformResource::findOrFail($data['id'])->update($data);
        } else {
            $transform = transformResource::create($data);
            foreach ($imgs['data'] as $img) {
                transformResourceImg::findOrFail($img['id'])->update([
                    'transform_resources_id' => $transform->id,
                ]);
            }
        }
        return $this->response->created();
    }

    /**
     * Display the specified resource.
     *
     * @param  transformResource $transform
     * @return \Dingo\Api\Http\Response
     */
    public function show(transformResource $transform)
    {
        return $this->response->item($transform, new transformResourceTransformer());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param transformResource $transform
     * @return \Dingo\Api\Http\Response
     * @throws \Exception
     */
    public function destroy(transformResource $transform)
    {
        $transform->delete();
        transformResourceImg::whereTransformResourcesId($transform->id)->delete();
        return $this->response->paginator(transformResource::orderBy('id', 'desc')->paginate(15), new transformResourceTransformer());
    }

    public function deleteSelectionTransform($list)
    {
        $deleteList = explode('-', $list);
        foreach ($deleteList as $delete) {
            $transform = transformResource::find($delete);
            $transform->delete();
            transformResourceImg::whereTransformResourcesId($delete)->delete();
        }
        return $this->response->paginator(transformResource::orderBy('id', 'desc')->paginate(15), new transformResourceTransformer());
    }

    public function query($condition, $query) {
        $transforms = transformResource::where($condition, 'like', "%$query%")->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($transforms, new transformResourceTransformer());
    }

    public function importTransform(Request $request, ExcelUploadHandler $uploader) {
        try {
            $data = Excel::toArray(new ResourceImport(), $request->file('excel'));
            unset($data[0][0]);
            $excel = array();
            foreach ($data[0] as $item) {
                $t = [
                    'city' => $item[0],
                    'form' => $item[1],
                    'unit_num' => $item[2],
                    'position' => $item[3],
                    'language' => $item[4],
                    'category' => $item[5],
                    'area' => $item[6],
                    'sov' => $item[7],
                    'visitor' => $item[8],
                    'traffic' => $item[9],
                    'minimum_buy' => $item[10],
                    'format' => $item[11],
                    'number' => $item[12],
                    'time' => $item[13],
                    'media_price' => $item[14],
                    'price' => $item[15],
                    'total_num' => $item[16],
                    'company' => $item[17],
                    'contributor' => $item[18],
                    'detail' => $item[19],
                    'country' => $item[20],
                    'name' => $item[21],
                    'requirements' => $item[22],
                    'isuse' => $item[23],
                ];
                array_push($excel, $t);
            }

            transformResource::insert($excel);

            return $this->response->paginator(transformResource::where([])->orderBy('id', 'desc')->paginate(15),
                new transformResourceTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function published(transformResource $transform)
    {
        $pulished = $transform->isuse ? true : false;
        $transform->update(['isuse' => ! $pulished]);
        return 'success';
    }

    public function publishedSelection($list)
    {
        $publishList = explode('-', $list);
        foreach ($publishList as $id) {
            $transform = transformResource::find($id);
            $transform->update(['isuse' => true]);
        }
        return 'success';
    }

    public function cancelSelection($list)
    {
        $publishList = explode('-', $list);
        foreach ($publishList as $id) {
            $transform = transformResource::find($id);
            $transform->update(['isuse' => false]);
        }
        return 'success';
    }

}
