<?php

namespace App\Repositories;


use App\interfaces\PageInterface;
use App\Models\About;
use App\Models\Banner;
use App\Models\Chamber;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;

class PageRepository implements PageInterface
{


    function createEvent($request)
    {
        if (Gate::any('isAdmin')) {
            $upload = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = $request->file('file')->getClientOriginalName() . uniqid() . '.' . $request->file->extension();
                $upload = $file->move('assets/frontend/images/events/', $name);
            }


            $ename   = $request->name;
            $house_no  = $request->house_no;
            $road_number  = $request->road_number;
            $area = $request->area;

            $district = $request->district;

            $date = $request->date;
            $img_url = $name;
            $time = $request->time;

            $description = $request->description;

            DB::insert(
                'insert into events (name, house_no, road_number, area , district, date, time, description, img_url, created_at) values ( :name, :house_no, :road_number, :area , :district, :date, :time, :description, :img_url, :created_at)',

                ['name' => $ename, 'house_no' => $house_no, 'road_number' => $road_number, 'area' => $area, 'district' => $district, 'date' => $date, 'time' => $time, 'description' => $description, 'created_at' => now(), 'img_url' => $img_url]
            );
        } else {
            abort(403);
        }
        return back();
    }


    function updateEvent($request)
    {
        if (Gate::any('isAdmin')) {
            if ($request->hasFile('file')) {
                if (File::exists('assets/frontend/images/events/' . Event::find($request->id)->img_url)) {
                    File::delete('assets/frontend/images/events/' . Event::find($request->id)->img_url);
                }

                $file = $request->file('file');
                $name = $request->file('file')->getClientOriginalName() . uniqid() . '.' . $request->file->extension();
                $upload = $file->move('assets/frontend/images/events/', $name);

                DB::table('events')
                    ->where('id', $request->id)
                    ->update([
                        "img_url" =>  $name
                    ]);
            }



            $ename   = $request->name;
            $house_no  = $request->house_no;
            $road_number  = $request->road_number;
            $area = $request->area;

            $district = $request->district;

            $date = $request->date;
            $time = $request->time;

            $description = $request->description;

            DB::table('events')
                ->where('id', $request->id)
                ->update(['name' => $ename, 'house_no' => $house_no, 'road_number' => $road_number, 'area' => $area, 'district' => $district, 'date' => $date, 'time' => $time, 'description' => $description, 'created_at' => now()]);
        } else {
            abort(403);
        }
        return back();
    }




  


    function servicesUpdate($request)
    {
        if (Gate::allows('isAdmin')) {

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = $request->file('file')->getClientOriginalName() . uniqid() . '.' . $request->file->extension();
                $upload = $file->move('images\template', $name);

                $contact = Contact::find(1);

                if ($contact->image != Null) {
                    File::delete($contact->image);

                    Contact::updateOrCreate(['id' => 1], [
                        'image' => $upload
                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } elseif ($contact->image == NULL) {
                    Contact::updateOrCreate(['id' => 1], [
                        'image' => $upload
                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } else {
                    session()->flash('upImageFailed', 'Task was successful!');
                }
            }
            return back();
        } else {
            abort(403);
        }
    }


    function aboutUpdate($request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = $request->file('file')->getClientOriginalName() . uniqid() . '.' . $request->file->extension();
                $upload = $file->move('images\template', $name);

                $about = About::find(1);

                if ($about->image != Null) {
                    File::delete($about->image);

                    About::updateOrCreate(['id' => 1], [
                        'profile_img' => $upload,
                        'name' => $request->name,
                        'degree' => $request->degree,
                        'brife_description' => $request->description
                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } elseif ($about->image == NULL) {
                    About::updateOrCreate(['id' => 1], [
                        'profile_img' => $upload,
                        'name' => $request->name,
                        'degree' => $request->degree,
                        'brife_description' => $request->description
                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } else {
                    session()->flash('upImageFailed', 'Task was successful!');
                }
            }

            return back();
        } else {
            abort(403);
        }
    }



    function aboutServicesUpdate($request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = $request->file('file')->getClientOriginalName() . uniqid() . '.' . $request->file->extension();
                $upload = $file->move('images\template', $name);

                $about = About::find(1);

                if ($about->service_img != Null) {
                    File::delete($about->service_img);

                    About::updateOrCreate(['id' => 1], [
                        'service_img' => $upload,
                        'service_title' => $request->service_title,
                        'service_description' => $request->service_description
                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } elseif ($about->service_img == NULL) {
                    About::updateOrCreate(['id' => 1], [
                        'service_img' => $upload,
                        'service_title' => $request->service_title,
                        'service_description' => $request->service_description
                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } else {
                    session()->flash('upImageFailed', 'Task was successful!');
                }
            }
            return back();
        } else {
            abort(403);
        }
    }



    function bannerAboutO($request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = 'blog' . $request->file('file')->getClientOriginalName() . uniqid() . '.' . $request->file->extension();
                $upload = $file->move('images\template', $name);

                $banner = Banner::find(2);


                if ($banner->bg_image != Null) {
                    File::delete($banner->bg_image);

                    Banner::updateOrCreate(['id' => 2], [
                        'bg_image' => $upload,
                        'title' => $request->title,
                        'subtitle' => $request->subtitle,
                        'link' => $request->link,
                        'button_text' => $request->button_text

                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } elseif ($banner->bg_image == NULL) {
                    Banner::updateOrCreate(['id' => 2], [
                        'bg_image' => $upload,
                        'title' => $request->title,
                        'subtitle' => $request->subtitle,
                        'link' => $request->link,
                        'button_text' => $request->button_text

                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } else {
                    session()->flash('upImageFailed', 'Task was successful!');
                }
            }
            return back();
        } else {
            abort(403);
        }
    }

    function bannerAboutT($request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = $request->file('file')->getClientOriginalName() . uniqid() . '.' . $request->file->extension();
                $upload = $file->move('images\template', $name);

                $banner = Banner::find(3);


                if ($banner->bg_image != Null) {
                    File::delete($banner->bg_image);

                    Banner::updateOrCreate(['id' => 3], [
                        'bg_image' => $upload,
                        'title' => $request->title,
                        'subtitle' => $request->subtitle,
                        'link' => $request->link,
                        'button_text' => $request->button_text
                    ]);

                    session()->flash('upImage', 'Task was successful!');
                } elseif ($banner->bg_image == NULL) {
                    Banner::updateOrCreate(['id' => 3], [
                        'bg_image' => $upload,
                        'title' => $request->title,
                        'subtitle' => $request->subtitle,
                        'link' => $request->link,
                        'button_text' => $request->button_text

                    ]);
                    session()->flash('upImage', 'Task was successful!');
                } else {
                    session()->flash('upImageFailed', 'Task was successful!');
                }
            }
            return back();
        } else {
            abort(403);
        }
    }





    function chamberDetailsUpdate($request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = $request->file('file')->getClientOriginalName() . uniqid() . '.' . $request->file->extension();
                $upload = $file->move('assets/frontend/images/chambers/', $name);


                $chamber = Chamber::find($request->id);
                File::delete('assets/frontend/images/chambers/' . $chamber->img_url);
                Chamber::where('id', $request->id)
                    ->update(

                        [
                            'name' =>   $request->name,
                            'house_no' =>   $request->house_no,
                            'road_number' =>   $request->road_number,
                            'area' =>   $request->area,
                            'district' =>   $request->district,
                            'day' =>   $request->day,
                            'time' =>   $request->time,
                            // 'patient_limit' =>   $request->patient_limit,
                            'img_url' => $name
                        ]
                    );


                session()->flash('upImage', 'Task was successful!');
            } elseif (!$request->hasFile('file')) {
                Chamber::where('id', $request->id)
                    ->update(

                        [
                            'name' =>   $request->name,
                            'house_no' =>   $request->house_no,
                            'road_number' =>   $request->road_number,
                            'area' =>   $request->area,
                            'district' =>   $request->district,
                            'day' =>   $request->day,
                            'time' =>   $request->time,
                            // 'patient_limit' =>   $request->patient_limit,

                        ]
                    );


                session()->flash('upImage', 'Task was successful!');
            }

            return back();
        } else {
            abort(403);
        }
    }


}
