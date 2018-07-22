<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\televisionResourcesRequest;
use App\Models\televisionResources;
use App\Models\televisionResourcesImg;
use App\Transformers\televisionResourcesTransformer;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class TelevisionResourcesController extends Controller
{
    public function index() {

    }

    public function tv() {
        $tv = televisionResources::paginate(15);
        return $this->response->paginator($tv, new televisionResourcesTransformer());
    }

    public function getTv(televisionResources $tv) {
        return $this->response->item($tv, new televisionResourcesTransformer());
    }

    public function delete(televisionResources $tv) {
        if($tv->delete()) {
            $imgs = $tv->televisionResourcesImgs;
            foreach ($imgs as $img) {
                $img->delete();
            }
            return $this->response->paginator(televisionResources::paginate(15), new televisionResourcesTransformer());
        }
    }

    public function store(televisionResourcesRequest $request) {

        $data = [
            'channel' => $request->channel,
            'form' => $request->form,
            'detail' => $request->detail,
            'area' => $request->area,
            'language' => $request->language,
            'category' => $request->category,
            'station' => $request->station,
            'minimum_buy' => $request->minimum_buy ? : '0',
            'time' => $request->time,
            'company' => $request->company ? : '*',
            'contributor' => $request->contributor ? : '*',
            'price' => $request->price ? : '0',
            'requirements' => $request->requirements ? : '*',
            'program' => $request->program,
            'country' => $request->country,
            'isuse' => $request->isuse,
        ];

        if (isset($request->id)) {
            $tv = televisionResources::findOrFail($request->id);
            $tv->update($data);
        }else {
            $tv = new televisionResources();
            $t = $tv->create($data);
            foreach ($request->televisionResourcesImgs['data'] as $img ) {
                televisionResourcesImg::findOrFail($img['id'])->update([
                    'television_resources_id' => $t -> id,
                ]);
            }
        }

        return $this->response->noContent();
    }

    public function searchTv($condition, $query) {

        $tvs = televisionResources::where($condition, 'like', "%$query%")->get();
        return $this->response->collection($tvs, new televisionResourcesTransformer());
    }
    
    public function importTv(Request $request) {
        /*
         *  上传excel文件，并保存到服务器
         * */
        $excel = $request->file('excel');
        $extension = $excel->getClientOriginalExtension();
        $base_path = 'uploads/excel/' . date('Ym/d', time());
        $upload_path = public_path() . '/'. $base_path;
        $filename = time() . '_' . str_random(10) . '.' . $extension;
        $excel->move($upload_path, $filename);

        $data = Excel::load($base_path . '/' . $filename, function ($reader){})->get();

        return $this->response->array([$data]);
    }

}
