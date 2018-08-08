<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\CaseImg;
use App\Models\CaseResource;
use App\Transformers\CaseResourceTransformer;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = CaseResource::where([])->orderBy('id', 'desc')->paginate();
        return $this->response->paginator($cases, new CaseResourceTransformer());
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
        unset($data['Imgs'], $data['created_at'], $data['updated_at'], $data['deleted_at']);

        try {
            if ($data['id']) {
                CaseResource::findOrFail($data['id'])->update($data);
            } else {
                $caseResource = CaseResource::create($data);
                foreach ($imgs['data'] as $img) {
                    CaseImg::whereId($img['id'])->update([
                        'case_resources_id' => $caseResource->id
                    ]);
                }
            }
            return $this->response->created();
        } catch (\Exception $e) {
            return $e;
        }

    }

    /**
     * @param CaseResource $caseResource
     * @return array
     */
    public function show(CaseResource $caseResource)
    {
        return $this->response->item($caseResource, new CaseResourceTransformer());
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
     * @param CaseResource $caseResource
     * @return \Dingo\Api\Http\Response|\Exception
     */
    public function destroy(CaseResource $caseResource)
    {
        try {
            $caseResource->delete();
            CaseImg::whereCaseResourcesId($caseResource->id)->delete();
            return $this->response->paginator(CaseResource::where([])->orderBy('id', 'desc')->paginate(),
                new CaseResourceTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }
}
