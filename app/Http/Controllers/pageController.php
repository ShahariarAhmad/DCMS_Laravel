<?php

namespace App\Http\Controllers;


use App\Http\Requests\aboutPage;
use App\Http\Requests\chamber_details;
use App\Http\Requests\create_event;
use App\Http\Requests\edit_event;
use App\Http\Requests\gallery as RequestsGallery;
use App\interfaces\PageInterface;
use App\Models\About;
use App\Models\Banner;
use App\Models\Chamber;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Gallery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;

class pageController extends Controller
{

    protected  $interface;

    function __construct(PageInterface $data)
    {
        $this->interface = $data;
    }



    function event()
    {
        $events = Event::all();
        $page_title = 'Events';
        $page       = 'events';
        return view('layouts.backend.pages.event', compact('page_title', 'page', 'events'));
    }
    function createEvent(create_event $request)
    {
        $this->interface->createEvent($request);
        return back()->with('success', 'Created Successfully.');
    }

    function editEvent($id)
    {
        if (Gate::any('isAdmin')) {
            $editEvents = Event::where('id', $id)->get();
            $events = Event::all();
            $page_title = 'Edit Events';
            $page       = 'edit_events';
            return view('layouts.backend.pages.edit_event', compact('page_title', 'page', 'editEvents', 'events'));
        } else {
            abort(403);
        }
        return back();
    }
    function updateEvent(edit_event $request)
    {
        $this->interface->updateEvent($request);
        return back()->with('success', 'Updated Successfully.');
    }

    function deleteEvent($id)
    {
        if (Gate::any('isAdmin')) {
            if (Gate::any('isAdmin')) {
                $event = Event::find($id);
                File::delete('assets/frontend/images/events/' . $event->img_url);
                $event->delete();
            } else {
                abort(403);
            }
            return back();
        }
    }


    function galleryDelete($id)
    {
        if (Gate::allows('isAdmin')) {
            if (File::exists('assets/frontend/images/gallery/' . Gallery::find($id)->image_url)) {
                File::delete('assets/frontend/images/gallery/' . Gallery::find($id)->image_url);
                Gallery::destroy($id);
            }

          
            return back()->with('danger', 'Photo Deleted.');
        } else {
            abort(403);
        }
    }

    function galleryUpload(RequestsGallery $request)
    {

        if (Gate::allows('isAdmin')) {

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = uniqid() . '.' . $request->file->extension();
                $upload = $file->move('assets/frontend/images/gallery/', $name);

                Gallery::create([
                    'image_url' => $name
                ]);
            }
            return back()->with('status','Image uploaded successfully.');
        } else {
            abort(403);
        }
    }

    function apiUpdate(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            Contact::updateOrCreate(['id' => 1], ['api_key' => $request->api]);
            return back();
        } else {
            abort(403);
        }
    }



    function servicesUpdate(Request $request)
    {
        $this->interface->servicesUpdate($request); 
    }


    function aboutUpdate(aboutPage $request)
    {
        $this->interface->aboutUpdate($request); 
        return back()->with('success', 'Updated Successfully');
    }



    function aboutServicesUpdate(Request $request)
    {
        $this->interface->aboutServicesUpdate($request); 
    }



    function bannerAboutO(Request $request)
    {
        $this->interface->bannerAboutO($request); 
    }

    function bannerAboutT(Request $request)
    {
        $this->interface->bannerAboutT($request); 
    }





    function feedback()
    {
        return 0;
    }

    function chamberDetailsUpdate(chamber_details $request)
    {
        $this->interface->chamberDetailsUpdate($request); 

        return back()->with('success', 'Updated Successfully.');
    }


    function socialLinks(Request $request)
    {

        $select = DB::table('social_media')->select('*')->get()->toArray();

        if ($request->fb != null) {

            DB::table('social_media')
                ->where("f_link", $select[0]->f_link)
                ->update(['f_link' => $request->facebook]);
        }


        if ($request->ln != null) {

            DB::table('social_media')
                ->where("l_link", $select[0]->l_link)
                ->update(['l_link' => $request->linkedin]);
        }

        if ($request->yt != null) {

            DB::table('social_media')
                ->where("y_link", $select[0]->y_link)
                ->update(['y_link' => $request->youtube]);
        }


        return back();
    }
}
