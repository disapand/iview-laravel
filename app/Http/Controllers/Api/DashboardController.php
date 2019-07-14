<?php

namespace App\Http\Controllers\Api;

use App\Models\CaseResource;
use App\Models\count;
use App\Models\dynamic;
use App\Models\insight;
use App\Models\internetcelebrityResource;
use App\Models\newspaperResource;
use App\Models\onlineResource;
use App\Models\outdoorResource;
use App\Models\televisionResources;
use App\Models\transformResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $televisons = televisionResources::all()->count();
        $onlines = onlineResource::all()->count();
        $outdoors = outdoorResource::all()->count();
        $transforms = transformResource::all()->count();
        $internetCelebrities = internetcelebrityResource::all()->count();
        $newspapers = newspaperResource::all()->count();
        $cases = CaseResource::all()->count();
        $case_game = CaseResource::where('category', 'like', '游戏')->count();
        $case_app = CaseResource::where('category', 'like', '应用')->count();
        $case_shop = CaseResource::where('category', 'like', '电商')->count();
        $case_lv = CaseResource::where('category', 'like', '旅游')->count();
        $case_3c = CaseResource::where('category', 'like', '电子产品')->count();
        $case_kxp = CaseResource::where('category', 'like', '快销品')->count();
        $case_other = CaseResource::where('category', 'like', '其他')->count();
        $insights = insight::all()->count();
        $insight_cw = insight::where('category', 'like', '财务')->count();
        $insight_cy = insight::where('category', 'like', '创意')->count();
        $insight_ds = insight::where('category', 'like', '电商')->count();
        $insight_lv = insight::where('category', 'like', '旅游')->count();
        $insight_mt = insight::where('category', 'like', '媒体')->count();
        $insight_pp = insight::where('category', 'like', '品牌')->count();
        $insight_sc = insight::where('category', 'like', '市场')->count();
        $insight_sz = insight::where('category', 'like', '数字')->count();
        $insight_xfz = insight::where('category', 'like', '消费者')->count();
        $insight_yx = insight::where('category', 'like', '游戏')->count();
        $dynamics = dynamic::all()->count();
        $dynamic_7 = dynamic::where('updated_at', '>=', Carbon::parse('today'))->count();
        $dynamic_6 = dynamic::whereBetween('updated_at', [Carbon::parse('1 day ago'), Carbon::parse('today')])->count();
        $dynamic_5 = dynamic::whereBetween('updated_at', [Carbon::parse('2 days ago'), Carbon::parse('1 day ago')])->count();
        $dynamic_4 = dynamic::whereBetween('updated_at', [Carbon::parse('3 day ago'), Carbon::parse('2 days ago')])->count();
        $dynamic_3 = dynamic::whereBetween('updated_at', [Carbon::parse('4 day ago'), Carbon::parse('3 days ago')])->count();
        $dynamic_2 = dynamic::whereBetween('updated_at', [Carbon::parse('5 day ago'), Carbon::parse('4 days ago')])->count();
        $dynamic_1 = dynamic::whereBetween('updated_at', [Carbon::parse('6 day ago'), Carbon::parse('5 days ago')])->count();
        $uv = count::where('updated_at', '>=', Carbon::parse('today'))->count();
        $pv = count::where('updated_at', '>=', Carbon::parse('today'))->select('host')->distinct()->get()->count();
        $uv1 = count::whereBetween('updated_at', [Carbon::parse('1 days ago'), Carbon::parse('today')])->count();
        $pv1 = count::whereBetween('updated_at', [Carbon::parse('1 days ago'), Carbon::parse('today')])->select('host')
            ->distinct()->get()->count();
        $uv2 = count::whereBetween('updated_at', [Carbon::parse('2 days ago'), Carbon::parse('1 days ago')])->count();
        $pv2 = count::whereBetween('updated_at', [Carbon::parse('2 days ago'), Carbon::parse('1 days ago')])->select('host')
            ->distinct()->get()->count();
        $uv3 = count::whereBetween('updated_at', [Carbon::parse('3 days ago'), Carbon::parse('2 days ago')])->count();
        $pv3 = count::whereBetween('updated_at', [Carbon::parse('3 days ago'), Carbon::parse('2 days ago')])->select('host')
            ->distinct()->get()->count();
        $uv4 = count::whereBetween('updated_at', [Carbon::parse('4 days ago'), Carbon::parse('3 days ago')])->count();
        $pv4 = count::whereBetween('updated_at', [Carbon::parse('4 days ago'), Carbon::parse('3 days ago')])->select('host')
            ->distinct()->get()->count();
        $uv5 = count::whereBetween('updated_at', [Carbon::parse('5 days ago'), Carbon::parse('4 days ago')])->count();
        $pv5 = count::whereBetween('updated_at', [Carbon::parse('5 days ago'), Carbon::parse('4 days ago')])->select('host')
            ->distinct()->get()->count();
        $uv6 = count::whereBetween('updated_at', [Carbon::parse('6 days ago'), Carbon::parse('5 days ago')])->count();
        $pv6 = count::whereBetween('updated_at', [Carbon::parse('6 days ago'), Carbon::parse('5 days ago')])->select('host')
            ->distinct()->get()->count();

        //$uv_count = count::all()->count();
        $uv_count = count::where([])->count();
        $pv_count = count::select('host')->distinct()->get()->count();

        return $this->response->array(compact('televisons', 'onlines', 'outdoors', 'transforms', 'internetCelebrities', 'case_3c', 'case_app', 'case_game',
            'case_kxp', 'case_lv', 'case_other', 'case_shop', 'insights', 'insight_cw', 'insight_cy', 'insight_ds', 'insight_lv', 'insight_mt', 'insight_pp',
            'insight_sc', 'insight_sz', 'insight_xfz', 'insight_yx', 'newspapers', 'cases', 'dynamics', 'dynamic_1', 'dynamic_2', 'dynamic_3', 'dynamic_4',
            'dynamic_5', 'dynamic_6', 'dynamic_7', 'uv', 'pv', 'uv1', 'uv2', 'uv3', 'uv4', 'uv5', 'uv6', 'pv1', 'pv2', 'pv3', 'pv4', 'pv5', 'pv6',
            'uv_count', 'pv_count'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
