<?php

namespace App\Http\Controllers\Api;

use App\Models\dynamic;
use App\Models\dynamicImg;
use App\Transformers\dynamicTransformer;
use Illuminate\Http\Request;

class dynamicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dynamics = dynamic::where([])->orderBy('id', 'desc')->paginate();
        return $this->response->paginator($dynamics, new dynamicTransformer());
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
        unset($data['Imgs']);
        try {
            if ($request->id) {
                dynamic::findOrFail($request->id)->update($data);
            } else {
                $dynamic = dynamic::create($data);
                foreach ($imgs['data'] as $img) {
                    dynamicImg::whereId($img['id'])->update([
                        'dynamic_id' => $dynamic->id,
                    ]);
                }
            }

            return $this->response->created();
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * @param dynamic $dynamic
     * @return \Dingo\Api\Http\Response
     */
    public function show(dynamic $dynamic)
    {
        return $this->response->item($dynamic, new dynamicTransformer());
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(dynamic $dynamic)
    {
        try{
            $dynamic->delete();
            dynamicImg::whereDynamicId($dynamic->id)->delete();
            return $this->response->paginator(dynamic::orderBy('id', 'desc')->paginate(),
                new dynamicTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deleteSelection($list)
    {
        $deleteList = explode('-', $list);
        foreach ($deleteList as $id) {
            $dynamic = dynamic::find($id);
            $dynamic->delete();
            dynamicImg::whereDynamicId($id)->delete();
        }
        return $this->response->paginator(dynamic::orderBy('id', 'desc')->paginate(),
        new dynamicTransformer());
    }

    public function query($condition, $query)
    {
        $dynamic = dynamic::where($condition, 'like', "%$query%")->orderBy('id', 'desc')->paginate();
        return $this->response->paginator($dynamic, new dynamicTransformer());
    }
}
