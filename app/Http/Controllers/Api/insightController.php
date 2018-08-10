<?php

namespace App\Http\Controllers\Api;

use App\Models\insight;
use App\Transformers\insightTransformer;
use Illuminate\Http\Request;

class insightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insights = insight::where([])->orderBy('id', 'desc')->paginate();
        return $this->response->paginator($insights, new insightTransformer());
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
            unset($data['created_at'], $data['updated_at'], $data['deleted_at']);
            if ($request->id) {
                insight::findOrFail($request->id)->update($data);
            } else {
                insight::create($data);
            }

            return $this->response->created();
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * @param insight $insight
     * @return \Dingo\Api\Http\Response
     */
    public function show(insight $insight)
    {
        return $this->response->item($insight, new insightTransformer());
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
     * @param insight $insight
     * @return \Dingo\Api\Http\Response|\Exception
     */
    public function destroy(insight $insight)
    {
        try {
            $insight->delete();
            return $this->response->paginator(insight::where([])->orderBy('id', 'desc')->paginate(),
                new insightTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function query($condition, $query) {
        try {
            $insight = insight::where($condition, 'like', "%$query%")->orderBy('id', 'desc')->paginate();
            return $this->response->paginator($insight, new insightTransformer());
        } catch (\Exception $e) {
            return $e;
        }
    }
}
