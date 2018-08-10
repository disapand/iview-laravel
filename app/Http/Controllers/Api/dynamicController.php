<?php

namespace App\Http\Controllers\Api;

use App\Models\dynamic;
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
        try {
            $data = $request->toArray();
            if ($request->id) {
                dynamic::findOrFail($request->id)->update($data);
            } else {
                dynamic::create($data);
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
            return $this->response->paginator(dynamic::where([])->orderBy('id', 'desc')->paginate(),
                new dynamicTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function query($condition, $query)
    {
        $dynamic = dynamic::where($condition, 'like', "%$query%")->orderBy('id', 'desc')->paginate();
        return $this->response->paginator($dynamic, new dynamicTransformer());
    }
}
