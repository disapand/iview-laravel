<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
use App\Http\Requests\Api\televisionResourcesRequest;
use App\Imports\ResourceImport;
use App\Models\televisionResources;
use App\Models\televisionResourcesImg;
use App\Transformers\televisionResourcesTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function deleteSelection($list)
    {
        $tmp = explode('-', $list);
        foreach ($tmp as $t) {
            $tv = televisionResources::find($t);
            if($tv->delete()) {
                $imgs = $tv->televisionResourcesImgs;
                foreach ($imgs as $img) {
                    $img->delete();
                }
            }
        }
        return $this->response->paginator(televisionResources::orderBy('id', 'desc') -> paginate(15), new televisionResourcesTransformer());
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
            'userid' => $request->userid,
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

        $tvs = televisionResources::where($condition, 'like', "%$query%")->paginate();
        return $this->response->paginator($tvs, new televisionResourcesTransformer());
    }

    public function importTv(Request $request, ExcelUploadHandler $uploader) {

        $data = Excel::toArray(new ResourceImport(), $request->file('excel'));
        unset($data[0][0]);
        $excel = array();
        foreach ($data[0] as $item) {
            $t = [
                'channel' => $item[0],
                'form' => $item[1],
                'detail' => $item[2],
                'area' => $item[3],
                'language' => $item[4],
                'category' => $item[5],
                'station' => $item[6],
                'minimum_buy' => $item[7],
                'time' => $item[8],
                'company' => $item[9],
                'contributor' => $item[10],
                'price' => $item[11],
                'country' => $item[12],
                'program' => $item[13],
                'requirements' => $item[14],
                'isuse' => $item[15],
            ];
            array_push($excel, $t);
        }

        try {
            televisionResources::insert($excel);
        } catch (\Exception $e) {
            return $e;
        }

        return $this->response->paginator(televisionResources::where([])->orderBy('id', 'desc')->paginate(15),
            new televisionResourcesTransformer());
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

    public function tvUse(televisionResources $tv)
    {
        $b = $tv->isuse ? true : false ;
        $tv->update(['isuse' => ! $b]);
        return $tv;
    }

    public function tvUseAll( $list ) {
        $t = explode('-', $list);
        foreach ($t as $tmp) {
            $tv = televisionResources::find($tmp);
            $tv->update(['isuse' => true]);
        }
        return 'success!';
    }

    public function tvUseNone( $list ) {
        $t = explode('-', $list);
        foreach ($t as $tmp) {
            $tv = televisionResources::find($tmp);
            $tv->update(['isuse' => false]);
        }
        return 'success!';
    }

    public function getTotals($userid)
    {
        $count =  televisionResources::where('userid', $userid)
            ->where('updated_at', '>=', Carbon::parse('7 days ago'))
            ->get()->count();
        return $count;
    }
}
