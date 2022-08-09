<?php

namespace Modules\Activity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Activity\Entities\Activity;

class ActivityController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $activitys = Activity::orderBy('updated_at', 'ASC')->paginate(10);
        return view('activity::index', compact('activitys'));
    }

    public function create()
    {
        return view('activity::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {
            $activity = new Activity;
            $activity->title = $request->title;
            $activity->short_description = $request->short_description;
            $activity->description = $request->description;

            $activity->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/activity', $filename);
                $activity->image = $path;
            }
            if ($request->hasFile('banner_image')) {
                $file = $request->banner_image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/activity', $filename);
                $activity->banner_image = $path;
            }
            $activity->save();
            return redirect()->route('activity.index')->with('success', 'Activity created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activity::edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $activity =  Activity::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {

            $activity->title = $request->title;
            $activity->short_description = $request->short_description;
            $activity->description = $request->description;

            $activity->publish = $request->publish ? 1 : 0;

            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/activity', $filename);
                $activity->image = $path;
            }
            if ($request->hasFile('banner_image')) {
                $file = $request->banner_image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/activity', $filename);
                $activity->banner_image = $path;
            }
            $activity->save();
            return redirect()->route('activity.index')->with('success', 'Activity updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->route('activity.index')->with('success', 'Activity deleted successfully');
    }
}
