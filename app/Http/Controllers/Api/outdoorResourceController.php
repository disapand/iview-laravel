<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
use App\Models\outdoorResource;
use App\Models\outdoorResourceImgs;
use App\Transformers\outdoorResourceImgsTransformer;
use App\Transformers\outdoorResourceTransformer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class outdoorResourceController extends Controller
{

    public function index() {
        $outdoors = outdoorResource::where([])->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($outdoors, new outdoorResourceTransformer());
    }

    public function show(outdoorResource $outdoor) {
        return $this->response->item($outdoor, new outdoorResourceTransformer());
    }

    public function update(Request $request) {
        $data = $request->toArray();
        $imgs = $data['outdoorResourceImgs'];
        unset($data['outdoorResourceImgs'], $data['created_at'], $data['updated_at'], $data['deleted_at']);
        if ($data['id']) {
            outdoorResource::findOrFail($data['id'])->update($data);
        } else {
            $outdoor = outdoorResource::create($data);
            foreach ($imgs['data'] as $img) {
                outdoorResourceImgs::findOrFail($img['id'])->update([
                    'outdoor_resources_id' => $outdoor->id,
                ]);
            }
        }
        return $this->response->created();
    }

    public function delete(outdoorResource $outdoor) {
        $outdoor->delete();
        outdoorResourceImgs::whereOutdoorResourcesId($outdoor->id)->delete();
        return $this->response->paginator(outdoorResource::orderBy('id', 'desc')->paginate(15), new outdoorResourceTransformer());
    }

    public function deleteSelection( $list )
    {
        $deleteList = explode('-', $list);
        foreach ( $deleteList as $id ) {
            $outdoor = outdoorResource::find($id);
            $outdoor->delete();
            outdoorResourceImgs::whereOutdoorResourcesId($id)->delete();
        }
        return $this->response->paginator(outdoorResource::orderBy('id', 'desc')->paginate(15), new outdoorResourceTransformer());
    }

    public function query($condition, $query) {
        $outdoors = outdoorResource::where($condition, 'like', '%' . $query . '%')->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($outdoors, new outdoorResourceTransformer());
    }

    public function importOutdoor(Request $request, ExcelUploadHandler $uploader){
        try{
            $excel = $request->file('excel');
            $result = $uploader->save($excel, 'outdoor');

            $data = Excel::load($result['path'])->get();

            outdoorResource::insert($data->toArray());
            return $this->response->paginator(outdoorResource::where([])->orderBy('id', 'desc')->paginate(15),
                new outdoorResourceTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function publish(outdoorResource $outdoor)
    {
        $published = $outdoor->isuse ? true : false;
        $outdoor->update(['isuse' => ! $published]);
        return 'success';
    }

    public function cancelSelection($list)
    {
        $cancelList = explode('-', $list);
        foreach ($cancelList as $id) {
            $outdoor = outdoorResource::find($id);
            $outdoor->update(['isuse' => false]);
        }
        return 'success';
    }

    public function publishedSelection($list)
    {
        $publishedList = explode('-', $list);
        foreach ($publishedList as $id) {
            $outdoor = outdoorResource::find($id);
            $outdoor->update(['isuse' => true]);
        }
        return 'success';
    }

}
