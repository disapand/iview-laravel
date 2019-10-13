<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
use App\Imports\ResourceImport;
use App\Models\count;
use App\Models\onlineResource;
use App\Models\onlineResourceImgs;
use App\Transformers\onlineResourceTransformer;
use App\Transformers\outdoorResourceTransformer;
use Carbon\Carbon;
use ClassesWithParents\E;
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
            $data = Excel::toArray(new ResourceImport(), $request->file('excel'));
            unset($data[0][0]);
            $excel = array();
            foreach ($data[0] as $item) {
                $t = [
                    'name' => $item[0],
                    'category' => $item[1],
                    'form' => $item[2],
                    'detail' => $item[3],
                    'area' => $item[4],
                    'language' => $item[5],
                    'platform' => $item[6],
                    'company' => $item[7],
                    'pv' => $item[8],
                    'uv' => $item[9],
                    'minimum_buy' => $item[10],
                    'format' => $item[11],
                    'media_price' => $item[12],
                    'price' => $item[13],
                    'contributor' => $item[14],
                    'link' => $item[15],
                    'country' => $item[16],
                    'requirements' => $item[17],
                    'isuse' => $item[18],
                ];
                array_push($excel, $t);
            }
//            return  $data;
//            $excel = $request->file('excel');
//            $result = $uploader->save($excel, 'online');
//
//            $data = Excel::load($result['path'], function ($reader){})->get();
//            return $data;
            onlineResource::insert($excel);
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

    public function getTotals($userid)
    {
        $lastWeek = [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()];
        $lastWeekCount =  onlineResource::where('userid', $userid)
            ->whereBetween('updated_at', $lastWeek)->count();
        $monthCount = onlineResource::whereMonth('updated_at', Carbon::now()->month)->count();
        return [$lastWeekCount, $monthCount];
    }

}
