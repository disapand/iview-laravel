<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\televisionResourcesRequest;
use App\Models\televisionResources;
use App\Transformers\televisionResourcesTransformer;
use Illuminate\Http\Request;

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
            return $this->response->array([]);
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
            $tv->create($data);
        }

        return $this->response->noContent();
    }

}
