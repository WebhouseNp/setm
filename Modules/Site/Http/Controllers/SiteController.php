<?php

namespace Modules\Site\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Site\Entities\About;
use Modules\Site\Entities\Banner;
use Modules\Site\Entities\Mission;
use Modules\Site\Entities\OpeningHour;
use Modules\Site\Entities\Site;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $site = Site::latest()->first();
        return view('site::index', compact('site'));
    }

    public function create()
    {
        return view('site::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('site::show');
    }

    public function edit($id)
    {
        return view('site::edit');
    }

    public function update(Request $request, $id)
    {
        $site = Site::latest()->first();
        //seo details
        $site->title = $request->title;
        $site->description = $request->description;
        $site->meta_title = $request->meta_title;
        $site->meta_keyword = $request->meta_keyword;

        //Social Media
        $site->facebook = $request->facebook;
        $site->instagram = $request->instagram;
        $site->whatsapp = $request->whatsapp;
        $site->youtube = $request->youtube;
        $site->twitter = $request->twitter;
        $site->linkedin = $request->linkedin;
        $site->messanger = $request->messanger;
        $site->skype = $request->skype;
        $site->viber = $request->viber;
        $site->video = $request->video;


        //Address and contact
        $site->email1 = $request->email1;
        $site->email2 = $request->email2;
        $site->contact1 = $request->contact1;
        $site->contact2  = $request->contact2;
        $site->address = $request->address;
        $site->map = $request->map;

        // Counter
        $site->title1 = $request->title1;
        $site->title2  = $request->title2;
        $site->title3 = $request->title3;
        $site->title4 = $request->title4;

        //Aboutus
        $site->about_title = $request->about_title;
        $site->about_description = $request->about_description;


        //Sustainable developement (sd)
        $site->sd_description = $request->sd_description;


        //Page Subittles
        $site->whatwedo_subtitle = $request->whatwedo_subtitle;
        $site->ouractivities_subtitle = $request->ouractivities_subtitle;





        //Aboutus Image Part
        if ($request->hasFile('about_image1')) {
            $file = $request->about_image1;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->about_image1 = $path;
        }
        if ($request->hasFile('about_image2')) {
            $file = $request->about_image2;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->about_image2 = $path;
        }
        if ($request->hasFile('about_image3')) {
            $file = $request->about_image3;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->about_image3 = $path;
        }
        if ($request->hasFile('about_image4')) {
            $file = $request->about_image4;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->about_image4 = $path;
        }


        //Sustainable developement (sd)
        if ($request->hasFile('sd_image1')) {
            $file = $request->sd_image1;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->sd_image1 = $path;
        }

        if ($request->hasFile('sd_image2')) {
            $file = $request->sd_image2;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->sd_image2 = $path;
        }

        // Page Banners

        if ($request->hasFile('fav_icon')) {
            $file = $request->fav_icon;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->fav_icon = $path;
        }

        if ($request->hasFile('header_logo')) {
            $file = $request->header_logo;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->header_logo = $path;
        }

        if ($request->hasFile('footer_logo')) {
            $file = $request->footer_logo;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->footer_logo = $path;
        }

        if ($request->hasFile('contactus_banner_image')) {
            $file = $request->contactus_banner_image;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->contactus_banner_image = $path;
        }

        if ($request->hasFile('whoweare_banner_image')) {
            $file = $request->whoweare_banner_image;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->whoweare_banner_image = $path;
        }

        if ($request->hasFile('whatweserve_banner_image')) {
            $file = $request->whatweserve_banner_image;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->whatweserve_banner_image = $path;
        }

        if ($request->hasFile('whatwedo_banner_image')) {
            $file = $request->whatwedo_banner_image;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->whatwedo_banner_image = $path;
        }

        if ($request->hasFile('ouractivities_banner_image')) {
            $file = $request->ouractivities_banner_image;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->ouractivities_banner_image = $path;
        }

        if ($request->hasFile('news_banner_image')) {
            $file = $request->news_banner_image;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/site', $filename);
            $site->news_banner_image = $path;
        }




        $site->save();
        return redirect()->back()->with('success', 'Site saved successfully');
    }

    public function saveOpeningHour(Request $request)
    {
        $openingHour = "";
        $latest = OpeningHour::latest()->first();
        if ($latest) {
            $openingHour = $latest;
        } else {
            $openingHour = new OpeningHour;
        }

        $openingHour->sunday = $request->sunday;
        $openingHour->monday = $request->monday;
        $openingHour->tuesday = $request->tuesday;
        $openingHour->wednesday = $request->wednesday;
        $openingHour->thursday = $request->thursday;
        $openingHour->friday = $request->friday;
        $openingHour->saturday = $request->saturday;
        $openingHour->save();
        return redirect()->back()->with('success', 'Opening hour saved successfully');
    }

    public function about(Request $request)
    {
        $about = "";
        $latest = About::latest()->first();
        if ($latest) {
            $about = $latest;
        } else {
            $about = new About;
        }
        $about->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $filename = rand(10, 100) . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/about', $filename);
            $about->image = $path;
        }
        $about->save();
        return redirect()->back()->with('success', 'About saved successfully');
    }
    public function missionVision(Request $request)
    {
        $mission = "";
        $latest = Mission::latest()->first();
        if ($latest) {
            $mission = $latest;
        } else {
            $mission = new Mission;
        }
        $mission->mission = $request->mission;
        if ($request->hasFile('missionImage')) {
            $file = $request->missionImage;
            $filename = rand(10, 100) . time() . '-mission.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/mission', $filename);
            $mission->mission_image = $path;
        }
        $mission->vision = $request->vision;
        if ($request->hasFile('visionImage')) {
            $file = $request->visionImage;
            $filename = rand(10, 100) . time() . '-vision.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/mission', $filename);
            $mission->vision_image = $path;
        }
        $mission->save();
        return redirect()->back()->with('success', 'About saved successfully');
    }
}
