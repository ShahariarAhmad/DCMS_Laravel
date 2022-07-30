<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Chamber;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Social_media;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Request;

class FrontInterface extends Controller
{
    //
    function home()
    {
        $banner = Banner::where('placement', "=", 'home')->get();

        $blog = Blog::limit(3)->get();
        $event = Event::all();
        $about = About::all();
        $page_title = 'Home';
        return view('layouts.frontend.pages.home', compact("banner", "blog", "event","about","page_title"));
    }


    function blog()
    {
        // $banner = Blog::orderby('id', 'DESC')->limit(1)->get();
    
        $articles = Blog::orderby('id', 'DESC')->paginate(8);
        $category = Category::all();
        $tag = Tag::all();
        $featured = Blog::where('feautured', '=', 'y')->get();

        $page_title = 'Blog';
        return view('layouts.frontend.pages.blog', compact("articles",  "featured", "category", "tag",'page_title'));
    }

    function full_article($id)
    {
        $tags = DB::table('blog_categories')
            ->join('categories', 'categories.id', 'blog_categories.category_id')
            ->where('blog_id', $id)->get();
        $categories = DB::table('blog_categories')
            ->join('categories', 'categories.id', 'blog_categories.category_id')
            ->where('blog_id', $id)->get();
        $blog = Blog::where('id', $id)->get();
        // return $blog[0]->img_url;

        $page_title       = 'ssssssssss';
        return view('layouts.frontend.pages.article_template', compact('page_title','tags', 'categories', 'blog'));
    }


    function tagRelatedPosts($id){
        $title = 'tag';
        $blogs = DB::table('blog_tags')
        ->join('blogs','blogs.id','blog_id')
        ->join('tags', 'tags.id', 'blog_tags.tag_id')
        ->where('blog_tags.tag_id', $id)
        ->select('title','article','blogs.id as articleId','img_url')
        ->get()->toArray();

        $page_title       = 'full_article';
        return view('master_layouts.post_list', compact('page', 'blogs', 'page_title'));
  
    }

    function categoryRelatedPost($id){

        $title = 'category';
        $blogs = DB::table('blog_categories')
        ->join('blogs','blogs.id','blog_id')
        ->join('categories', 'categories.id', 'blog_categories.category_id')
        ->where('blog_categories.category_id', $id)
        ->select('title','article','blogs.id as articleId','img_url')
        ->get()->toArray();

        $chamber = Chamber::all();
        $social  = Social_media::all();

        // echo "<pre>";
        // print_r($tags);

        $page       = 'full_article';
        return view('master_layouts.post_list', compact('page', 'chamber', 'social', 'blogs','title'));
  
    }

    function gallery()
    {
        $gallery = Gallery::paginate(10);
        $page_title = 'Gallery';

        return view('layouts.frontend.pages.gallery', compact( "gallery",'page_title'));
    }


    function about()
    {
        $bio = About::all();
        $social = Social_media::all();
        $chamber = Chamber::all();
        $blog = Blog::limit(3)->get();
        $appointment = Banner::where("placement", "=", "about_o")->get();
        $diet = Banner::where("placement", "=", "about_t")->get();
        $page_title = 'About';

        return view('layouts.frontend.pages.about', compact("chamber", "social", "bio", "blog", "appointment", "diet",'page_title'));
    }


    function contact()
    {
        $social = Social_media::all();
        $contact = Contact::all();
        $chamber = Chamber::all();
        $page_title = 'Contact';
        return view('layouts.frontend.pages.contact', compact('chamber', 'social', 'contact','page_title'));
    }

    function login()
    {

        $social = Social_media::all();
        $chamber = Chamber::limit(3)->get();
        $page_title = 'Login / Register';


        return view('master_layouts.login', compact('chamber', 'social','page_title'));
    }

    function register()
    {
        $social = Social_media::all();
        $chamber = Chamber::limit(3)->get();
        return view('master_layouts.register', compact('chamber', 'social'));
    }
}
