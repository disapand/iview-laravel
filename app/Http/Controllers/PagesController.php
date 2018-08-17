<?php

namespace App\Http\Controllers;

use App\Models\insight;
use App\Models\internetcelebrityResource;
use App\Models\newspaperResource;
use App\Models\onlineResource;
use App\Models\outdoorResource;
use App\Models\televisionResources;
use App\Models\transformResource;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function job() {
        return view('pages.job');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function about() {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function newspaper()
    {
        $newspapers = newspaperResource::with('newspaperResourceImgs')->paginate(9);
        return view('pages.newspaper', compact('newspapers'));
    }

    public function newspaperShow(newspaperResource $newspaper)
    {
        return view('pages.newspaper_in', compact('newspaper'));
    }

    public function television()
    {
        $televisions = televisionResources::with('televisionResourcesImgs')->paginate(9);
        return view('pages.television', compact('televisions'));
    }

    public function televisionShow(televisionResources $television)
    {
        return view('pages.television_in', compact('television'));
    }

    public function outdoor()
    {
        $outdoors = outdoorResource::with('outdoorResourceImgs')->paginate(9);
        return view('pages.outdoor', compact('outdoors'));
    }

    public function outdoorShow(outdoorResource $outdoor)
    {
        return view('pages.outdoor_in', compact('outdoor'));
    }

    public function transform()
    {
        $transforms = transformResource::with('transformResourceImgs')->paginate(9);
        return view('pages.transform', compact('transforms'));
    }

    public function transformShow(transformResource $transform)
    {
        return view('pages.transform_in', compact('transform'));
    }

    public function internetCelebrity()
    {
        $internetCelebrities = internetcelebrityResource::with(['Imgs', 'categories'])->paginate(9);
        return view('pages.internetcelebrity', compact('internetCelebrities'));
    }

    public function online()
    {
        $onlines = onlineResource::with('onlineResourceImgs')->paginate(9);
        return view('pages.online', compact('onlines'));
    }

    public function onlineShow(onlineResource $online)
    {
        return view('pages.online_in', compact('online'));
    }

    public function internetCelebrityShow(internetcelebrityResource $internetCelebrity)
    {
        $tmp = $internetCelebrity->categories;
        $arr = [];
        foreach ($tmp as $t){
            array_push($arr, $t['name']);
        }
        $categories = implode(',', $arr);
        return view('pages.internetCelebrity_in', compact('internetCelebrity', 'categories'));
    }

    public function insight()
    {
        $insights = insight::all();
        return view('pages.insight', compact('insights'));
    }

    public function insightShow(insight $insight)
    {
        return view('pages.insight_in', compact('insight'));
    }

}
