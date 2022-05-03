<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Unit;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $about = About::first();
        view()->share('about', $about);
    }

    public function home()
    {
        $sliders = Slider::all();
        $units = Unit::all();
        $partners = Partner::all();
        $about = About::first();
        return view('home', compact('sliders', 'units', 'partners', 'about'));
    }

    public function detail_unit(Unit $unit)
    {
        $units = Unit::all();
        return view('detail_unit', compact('unit', 'units'));
    }
    public function galleries()
    {
        $galleries = Gallery::all();
        return view('gallery', compact('galleries'));
    }
    public function contact()
    {
        $about = About::first();
        return view('contact', compact('about'));
    }
}
