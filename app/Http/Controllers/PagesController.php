<?php

namespace App\Http\Controllers;

use App\Models\internetcelebrityResource;
use App\Models\newspaperResource;
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

    public function newspaper()
    {
        $newspapers = newspaperResource::with('newspaperResourceImgs')->paginate(9);
        return view('pages.newspaper', compact('newspapers'));
    }

    public function television()
    {
        $televisions = televisionResources::with('televisionResourcesImgs')->paginate(9);
        return view('pages.television', compact('televisions'));
    }

    public function outdoor()
    {
        $outdoors = outdoorResource::with('outdoorResourceImgs')->paginate(9);
        return view('pages.outdoor', compact('outdoors'));
    }

    public function transform()
    {
        $transforms = transformResource::with('transformResourceImgs')->paginate(9);
        return view('pages.transform', compact('transforms'));
    }

    public function internetCelebrity()
    {
        $internetCelebrities = internetcelebrityResource::with(['Imgs', 'categories'])->paginate(9);
        return view('pages.internetcelebrity', compact('internetCelebrities'));
    }
}
