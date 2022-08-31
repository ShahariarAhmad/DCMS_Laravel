<?php

namespace App\Http\Controllers;

use App\Http\Requests\category as RequestsCategory;
use App\Http\Requests\edit_article;
use App\Http\Requests\write_article;
use App\interfaces\BlogInterface;
use App\Models\Blog;
use App\Models\blog_category;
use App\Models\Category;
use App\Models\Services_section_inbox;
use App\Models\Tag;
use App\Models\User;
use App\View\Components\dashboard\admin\contact;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class blogController extends Controller
{
    protected  $interface;

    function __construct(BlogInterface $data)
    {
        $this->interface = $data;
    }

    public function write_a_blog()
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {
            $categories = Category::all();
            // $tags = Tag::all();
            $page_title = 'Write A Blog';
            $page       = 'write_a_blog';
            return view('layouts.backend.blog.write', compact('page_title', 'page', 'categories'));
        } else {
            abort(403);
        }
    }

    
    function deleteInboxMsg($id)
    {
        Services_section_inbox::find($id)->delete();
        return back();
    }

    function allBlogPost()
    {
        $this->interface->all();
  
    }

    function upload(write_article $request)
    {

        $this->interface->upload($request);
       
    }

    function deleteBlogPost($id)
    {
        $this->interface->upload($id);
      
    }

    function editBlogPost($blogId)
    {
        $this->interface->edit($blogId);
    }



    function updateBlogPost(edit_article $request)
    {

        $this->interface->update($request);
    }





    function attachFeaturedBlogPost($id)
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {


            if (Auth::user()->role_id === 1) {
                $feautured = Blog::where('feautured', 'y')->count();
                if ($feautured < 4) {
                    $featured = Blog::find($id);
                    $featured->feautured = 'y';
                    $featured->save();
                } else {
                    session()->flash('attached', 'Maximum 4 featured post is allowed.');
                }
            }
        } else {
            abort(403);
        }
        return back();
    }

    function detachFeaturedBlogPost($id)
    {

        if (Gate::any(['isAdmin', 'isWriter'])) {
            if (Auth::user()->role_id === 1) {
                $featured = Blog::find($id);
                $featured->feautured = 'n';
                $featured->save();
                return back();
            }
        } else {
            abort(403);
        }
    }




    function tags()
    {

        if (Gate::any(['isAdmin', 'isWriter'])) {
            $tags = Tag::all()->toArray();
            $page_title = 'Tags';
            $page       = 'tags';
            return view('layouts.backend.blog.tag', compact('page_title', 'page', 'tags'));
        } else {
            abort(403);
        }
    }


    function tagRequest(Request $request)
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {
            Tag::create(['tag' => $request->tag]);

            return back();
        } else {
            abort(403);
        }
    }

    function tagDelete($id)
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {
            Tag::find($id)
                ->delete();

            return back();
        } else {
            abort(403);
        }
    }

    function categories()
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {
            $categories = Category::all()->toArray();
            $page_title = 'Categories';
            $page       = 'categories';
            return view('layouts.backend.blog.category', compact('page_title', 'page', 'categories'));
        } else {
            abort(403);
        }
    }

    function categoryRequest(RequestsCategory $request)
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {
            Category::create(['category' => $request->category]);

            return back();
        } else {
            abort(403);
        }
    }

    function categoryDelete($id)
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {
            Category::find($id)
                ->delete();

            return back();
        } else {
            abort(403);
        }
    }
}
