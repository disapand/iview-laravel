<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ExcelUploadHandler;
use App\Imports\ResourceImport;
use App\Models\internetcelebrityResource;
use App\Models\internetcelebrityResourceCategory;
use App\Models\internetcelebrityResourceImgs;
use App\Transformers\internetcelebrityResourcTransformer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class internetcelebrityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internetcelebrities = internetcelebrityResource::where([])->orderBy('id', 'desc')->paginate(15);
        return $this->response->paginator($internetcelebrities, new internetcelebrityResourcTransformer());
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
        $imgs = $data['Imgs'];
        $categories = $data['category'];
        unset($data['Imgs'], $data['category'], $data['created_at'], $data['updated_at'], $data['deleted_at']);
        try {
            if ($data['id']) {
                $internet = internetcelebrityResource::findOrFail($data['id']);
                $internet->categories()->detach();
                foreach ($categories as $category) {
                    $internet->categories()->attach(internetcelebrityResourceCategory::whereName($category)
                        ->get(['id'])->first()['id']);
                }
                $internet->update($data);
            } else {
                $internet = internetcelebrityResource::create($data);
                foreach ($categories as $category) {
                    $internet->categories()->attach(internetcelebrityResourceCategory::whereName($category)
                        ->get(['id'])->first()['id']);
                }
                foreach ($imgs['data'] as $img) {
                    internetcelebrityResourceImgs::findOrFail($img['id'])->update([
                        'internetcelebrity_resources_id' => $internet->id,
                    ]);
                }
            }

            return $this->response->created();
        } catch (\Exception $e) {
            return $e;
        }

    }


    public function show(internetcelebrityResource $internet)
    {
        return $this->response->item($internet, new internetcelebrityResourcTransformer());
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
     * @param internetcelebrityResource $internet
     * @return \Dingo\Api\Http\Response
     * @throws \Exception
     */
    public function destroy(internetcelebrityResource $internet)
    {
        try {
            $internet->categories()->detach();
            $internet->delete();
            internetcelebrityResourceImgs::whereInternetcelebrityResourcesId($internet->id)->delete();
            return $this->response->paginator(internetcelebrityResource::orderBy('id', 'desc')->paginate(15),
                new internetcelebrityResourcTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deleteSelection($list)
    {
        $deleteList = explode('-', $list);
        foreach ($deleteList as $id) {
            $internet = internetcelebrityResource::find($id);
            $internet->categories()->detach();
            $internet->delete();
            internetcelebrityResourceImgs::whereInternetcelebrityResourcesId($internet->id)->delete();
        }
        return $this->response->paginator(internetcelebrityResource::orderBy('id', 'desc')->paginate(15),
            new internetcelebrityResourcTransformer());
    }

    public function query($condition = '', $query = '') {
       try{
           if ($condition == 'category') {
                $internet = internetcelebrityResource::whereHas('categories', function ($q) use ($query){
                    $q->where('name', 'like', "%$query%");
                })->paginate(15);
           } else {
               $internet = internetcelebrityResource::where($condition, 'like', "%$query%")->orderBy('id', 'desc')->paginate(15);
           }
           return $this->response->paginator($internet, new internetcelebrityResourcTransformer());
       } catch (\Exception $e) {
           return $e;
       }
    }

    public function importInternet(Request $request, ExcelUploadHandler $uploader)
    {
        try {
            ini_set('memory_limit', '2000M');
            $data = Excel::toArray(new ResourceImport(), $request->file('excel'));
            unset($data[0][0]);
            foreach ($data[0] as $item) {
                $t = [
                    'name' => $item[0],
                    'platform' => $item[1],
                    'ad_form' => $item[2],
                    'category' => $item[3],
                    'detail' => $item[4],
                    'area' => $item[5],
                    'language' => $item[6],
                    'fans' => $item[7],
                    'media_price' => $item[8],
                    'price' => $item[9],
                    'company' => $item[10],
                    'contributor' => $item[11],
                    'advantage' => $item[12],
                    'country' => $item[13],
                    'cooperation' => $item[14],
                    'requirements' => $item[15],
                    'isuse' => $item[16],
                ];
                $categories = explode(',', $t['category']);
                unset($t['category']);
                $internet = internetcelebrityResource::create($t);
                foreach ($categories as $category) {
                    $internet->categories()->attach(internetcelebrityResourceCategory::whereName($category)
                        ->get(['id'])->first()['id']);
                }
            }
            return $this->response->paginator(internetcelebrityResource::where([])->orderBy('id', 'desc')->paginate(15),
                new internetcelebrityResourcTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function publish(internetcelebrityResource $internet)
    {
        $published = $internet->isuse ? true : false;
        $internet->update(['isuse' => ! $published]);
        return 'success';
    }

    public function cancelSelection($list)
    {
        $cancelList = explode('-', $list);
        foreach ($cancelList as $id) {
            $internet = internetcelebrityResource::find($id);
            $internet->update(['isuse' => false]);
        }
        return 'success';
    }

    public function publishedSelection($list)
    {
        $cancelList = explode('-', $list);
        foreach ($cancelList as $id) {
            $internet = internetcelebrityResource::find($id);
            $internet->update(['isuse' => true]);
        }
        return 'success';
    }

}
