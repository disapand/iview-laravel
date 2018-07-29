<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
use App\Http\Requests\Api\televisionResourcesRequest;
use App\Models\televisionResources;
use App\Models\televisionResourcesImg;
use App\Transformers\televisionResourcesTransformer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TelevisionResourcesController extends Controller
{
    public function index() {

    }

    public function tv() {
        $tv = televisionResources::where([])->orderBy('id', 'desc')->paginate(15);
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
    
    public function importTv(Request $request, ExcelUploadHandler $uploader) {
        /*
         *  上传excel文件，并保存到服务器
         * */
        $excel = $request->file('excel');
        $result = $uploader->save($excel, 'television');

        /*
         *  从上传的文件中获取数据
         * */
        $data = Excel::load($result['path'], function ($reader){})->get();

        /*
         *  将获取到的数据存入数据库
         * */
        televisionResources::insert($data->toArray());

        return $this->response->paginator(televisionResources::paginate(15), new televisionResourcesTransformer());
    }

    public function recommendTv() {
        $tvs = televisionResources::where([])->orderBy('id', 'desc')->take(4)->get();
        return $this->response->collection($tvs, new televisionResourcesTransformer());
    }

    public function search($country = '', $category = '', $form = '') {

        $tvs = televisionResources::where(['country' => $country, 'category' => $category, 'form' => $form])
            ->paginate(15);

        return $this->response->paginator($tvs, new televisionResourcesTransformer());
    }

}
