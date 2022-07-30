<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Chamber;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Social_media;
use Illuminate\Http\Request;

class FrontSpaController extends Controller
{
    function index()
    {
         $banner = Banner::where('placement', "=", 'home')->get();
        //  if (count($banner) == false) {
        //     return 'empty';
        //  }else{
        //      return 'Not Empty';
        //  }
         
        $chamber = Chamber::all();
        // dd($chamber);
        $gallery = Gallery::paginate(9);

        $blog = Blog::all()->count();
        $event = Event::all();
        $about = About::all();
        $social = Social_media::all();

        return view('dcms', compact("banner", "blog", "event", "about", 'chamber', 'gallery', 'social'));
    }

    function blogCount()
    {
        $blog = Blog::all()->count();

        return response($blog);
    }
    function blog($from , $to)
    {
        $blog = Blog::whereBetween('id', [$from, $to])->get();

        return response($blog);
    }

    function fullArticle($id)
    {
        $blog = Blog::whereId($id)->get();

        return response($blog);
    }

    function gallery($from , $to)
    {
        $gallery = Gallery::whereBetween('id', [$from, $to])->get();

        return response($gallery);

    }

    function galleryCount()
    {
        $gallery = Gallery::all()->count();

        return response($gallery);
    }
    
}
