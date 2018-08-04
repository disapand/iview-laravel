<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
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
        return $this->response->paginator(transformResource::paginate(15), new transformResourceTransformer());
    }

    public function query($condition, $query) {
        $transforms = transformResource::where($condition, 'like', "%$query%")->paginate(15);
        return $this->response->paginator($transforms, new transformResourceTransformer());
    }

    public function importTransform(Request $request, ExcelUploadHandler $uploader) {
        try {
            $excel = $request->file('excel');
            $result = $uploader->save($excel, 'transform');

            $data = Excel::load($result['path'])->get();
            transformResource::insert($data->toArray());

            return $this->response->paginator(transformResource::where([])->orderBy('id', 'desc')->paginate(15),
                new transformResourceTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

}
