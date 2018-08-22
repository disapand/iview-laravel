<?php

namespace App\Http\Controllers;

use App\Models\CaseResource;
use App\Models\dynamic;
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
    public function adimin()
    {
        return view('welcome');
    }

    public function index() {
        $cases = CaseResource::with('Imgs')->orderBy('id', 'desc')->take(6)->get();
        return view('index', compact('cases'));
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

    public function aboutIn()
    {
        $abouts = dynamic::with('imgs')->get();
        return view('pages.about_in', compact('abouts'));
    }

    public function aboutShow($id)
    {
        $dynamic = dynamic::findOrFail($id);
        $recommends = dynamic::where('id', '<>', $id)->with('Imgs')->orderBy('id', 'desc')->whereHas('Imgs')->take(4)->get();
        return view('pages.about_show', compact('dynamic', 'recommends'));
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
        $recommends = newspaperResource::where('id', '<>', $newspaper->id)->with('newspaperResourceImgs')->orderBy('id', 'desc')->take(4)->get();
        return view('pages.newspaper_in', compact('newspaper', 'recommends'));
    }

    public function television()
    {
        $televisions = televisionResources::with('televisionResourcesImgs')->paginate(9);
        return view('pages.television', compact('televisions'));
    }

    public function televisionShow(televisionResources $television)
    {
        $recommends = televisionResources::where('id', '<>', $television->id)->with('televisionResourcesImgs')->orderBy('id', 'desc')->take(4)->get();
        return view('pages.television_in', compact('television', 'recommends'));
    }

    public function outdoor()
    {
        $outdoors = outdoorResource::with('outdoorResourceImgs')->paginate(9);
        return view('pages.outdoor', compact('outdoors'));
    }

    public function outdoorShow(outdoorResource $outdoor)
    {
        $recommends = outdoorResource::where('id', '<>', $outdoor->id)->with('outdoorResourceImgs')->orderBy('id', 'desc')->take(4)->get();
        return view('pages.outdoor_in', compact('outdoor', 'recommends'));
    }

    public function transform()
    {
        $transforms = transformResource::with('transformResourceImgs')->paginate(9);
        return view('pages.transform', compact('transforms'));
    }

    public function transformShow(transformResource $transform)
    {
        $recommends = transformResource::where('id', '<>', $transform->id)->with('transformResourceImgs')->orderBy('id', 'desc')->take(4)->get();
        return view('pages.transform_in', compact('transform', 'recommends'));
    }

    public function online()
    {
        $onlines = onlineResource::with('onlineResourceImgs')->paginate(9);
        return view('pages.online', compact('onlines'));
    }

    public function onlineShow(onlineResource $online)
    {
        $recommends = onlineResource::where('id', '<>', $online->id)->with('onlineResourceImgs')->orderBy('id', 'desc')->take(4)->get();
        return view('pages.online_in', compact('online', 'recommends'));
    }

    public function internetCelebrity()
    {
        $internetCelebrities = internetcelebrityResource::with(['Imgs', 'categories'])->paginate(9);
        return view('pages.internetcelebrity', compact('internetCelebrities'));
    }

    public function internetCelebrityShow(internetcelebrityResource $internetCelebrity)
    {
        $tmp = $internetCelebrity->categories;
        $arr = [];
        foreach ($tmp as $t){
            array_push($arr, $t['name']);
        }
        $categories = implode(',', $arr);
        $recommends = internetcelebrityResource::where('id', '<>', $internetCelebrity->id)->with('Imgs')->orderBy('id', 'desc')->take(4)->get();
        return view('pages.internetCelebrity_in', compact('internetCelebrity', 'categories', 'recommends'));
    }

    public function insight()
    {
        $insights = insight::all();
        return view('pages.insight', compact('insights'));
    }

    public function insightShow(insight $insight)
    {
        $recommends = insight::where('id', '<>', $insight->id)->orderBy('id', 'desc')->take(4)->get();
        return view('pages.insight_in', compact('insight', 'recommends'));
    }

    public function cases()
    {
        $cases = CaseResource::with('Imgs')->get();
        return view('pages.cases', compact('cases'));
    }

    public function casesShow(CaseResource $cases)
    {
        $recommends = CaseResource::where('id', '<>', $cases->id)->with('Imgs')->orderBy('id', 'desc')->take(4)->get();
        return view('pages.cases_in', compact('cases', 'recommends'));
    }

}
