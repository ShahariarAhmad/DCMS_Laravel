<?php

namespace App\Http\Controllers;

use App\Http\Requests\category as RequestsCategory;
use App\Http\Requests\edit_article;
use App\Http\Requests\write_article;
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
        if (Gate::any(['isAdmin', 'isWriter'])) {
            // dd($role = Blog::find(Auth::id()));


            if (Auth::user()->role_id === 1) {
                $blog = Blog::select('*')
                    ->orderByDesc('id', 'desc')->get();
            } elseif (Auth::user()->role_id === 4) {
                $blog = Blog::select('*')
                    ->where('user_id', Auth::id())
                    ->orderByDesc('id', 'desc')->get();
            }

            $category = blog_category::all();
            $tag = Tag::all();

            $page_title = 'All Articles';
            $page       = 'all_articles';
            return view('layouts.backend.blog.all_article', compact('page_title', 'page', 'category', 'tag', 'blog'));
        } else {
            abort(403);
        }
    }

    function uploadBlogPost(write_article $request)
    {

        if (Gate::any(['isAdmin', 'isWriter'])) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = $request->file('file')->getClientOriginalName() . rand().'.' . $request->file->extension();
                $upload = $file->move('assets\frontend\images\blog', $name);
            }

            $tag = $request->tag;
            $category = $request->category;
            $title = $request->title;
            $article = $request->article;
            $img_url = $upload;
            $other_link = 'none';
            $hyperlink_name = 'none';
            $hand_picked = 'y';
            $feautured = 'n';
            $status = 'approved';

            DB::transaction(function () use ($title, $article, $img_url, $other_link, $hyperlink_name, $hand_picked, $feautured, $status, $tag, $category) {

                DB::insert('insert into blogs (title, article, img_url, other_link , hyperlink_name, hand_picked, feautured, status, user_id, created_at) values (:title, :article, :img_url, :other_link , :hyperlink_name, :hand_picked, :feautured, :status, :user_id,:created_at)', ['title' => $title, 'article' => $article, 'img_url' => $img_url, 'other_link' => $other_link, 'hyperlink_name' => $hyperlink_name, 'hand_picked' => $hand_picked, 'feautured' => $feautured, 'status' => $status, 'user_id' => Auth::id(), 'created_at' => now()]);

                $blogId = DB::getPdo()->lastInsertId();
                // if ($tag != NULL) {
                //     foreach ($tag as $tagId) {
                //         DB::insert('insert into  blog_tags (blog_id, tag_id) values ( :blog_id, :tag_id )', ['blog_id' => $blogId, 'tag_id' => $tagId]);
                //     }
                // }

                if ($category != NULL) {
                    foreach ($category as $categoryId) {
                        DB::insert('insert into  blog_categories (blog_id, category_id) values ( :blog_id, :category_id )', ['blog_id' => $blogId, 'category_id' => $categoryId]);
                    }
                }
            });
            return back()->with('status','Task completed successfully');

        } else {
            abort(403);
        }
       
    }

    function deleteBlogPost($id)
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {

            if (Auth::user()->role_id === 1) {
                $post = Blog::find($id);
                File::delete($post->img_url);
                $post->delete();
                return back()->with('status','Article deleted...');
            } elseif (Auth::user()->role_id === 4) {

                // $blog = Blog::select('*');
                $blog =  DB::table('blogs')
                    ->where('id', Auth::id())
                    ->where('user_id', Auth::id())
                    ->orderByDesc('id', 'desc')->get();
            }

        } else {
            abort(403);
        }
      
    }

    function editBlogPost($blogId)
    {
        if (Gate::any(['isAdmin', 'isWriter'])) {


            if (Auth::user()->role_id === 1) {

                $blog = DB::table('blogs')
                    ->select('*')
                    ->where('id', $blogId)
                    ->get();
                Blog::find($blogId)->get();

                $categories = Category::all();
           
            } elseif (Auth::user()->role_id === 4) {

                $blog = DB::table('blogs')
                    ->select('*')
                    ->where('id', $blogId)
                    ->where('user_id', Auth::id())
                    ->get();
                Blog::find($blogId)->get();

                $categories = Category::all();
            
            }

            $page_title = 'Edit_Article';
            $page       = 'edit_article';
            return view('layouts.backend.blog.edit', compact('page_title', 'page', 'categories', 'blog'));
        } else {
            abort(403);
        }
    }



    function updateBlogPost(edit_article $request)
    {

        if (Gate::any(['isAdmin', 'isWriter'])) {

            if ($request->hasFile('file')) {
                $post = Blog::find($request->id);
                

                if (File::exists($post->img_url)) {
                    File::delete($post->img_url);;
                    $file = $request->file('file');
                    $name = $request->file('file')->getClientOriginalName(). rand() . '.' . $request->file->extension();
                    $upload = $file->move('assets\frontend\images\blog', $name);

                    DB::table('blogs')
                        ->where('id', $request->id)
                        ->update([
                            "img_url" =>  $upload
                        ]);
                }
            }


            DB::table('blogs')
                ->where('id', $request->id)
                ->update([
                    "title" => $request->title,
                    "article" => $request->article,

                ]);

            $blogId = $request->id;
            $category = $request->category;

            DB::transaction(function () use ($blogId, $category) {
                DB::table('blog_categories')->where('blog_id', $blogId)->delete();
                foreach ($category as $categoryId) {
                    DB::insert('insert into  blog_categories (blog_id, category_id) values ( :blog_id, :category_id )', ['blog_id' => $blogId, 'category_id' => $categoryId]);
                }
            });
        } else {
            abort(403);
        }
        return back()->with('status','Article edited successfully...');
        ;
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
