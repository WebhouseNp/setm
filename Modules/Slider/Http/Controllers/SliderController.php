<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Slider\Entities\Slider;

class SliderController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sliders = Slider::orderBy('updated_at', 'desc')->paginate(1000);
        return view('slider::index', compact('sliders'));
    }


    public function create()
    {

        return view('slider::create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:7000'
        ]);
        try {
            $slider = new Slider;
            $slider->slider_title = $request->slider_title;
            $slider->slider_description = $request->slider_description;
            $slider->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/slider', $filename);
                $slider->image = $path;
            }
            $slider->save();
            return redirect()->route('slider.index')->with('success', 'Slider created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('slider::edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $this->validate($request, [
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:7000'
        ]);
        try {
            $slider->slider_title = $request->slider_title;
            $slider->slider_description = $request->slider_description;
            $slider->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/slider', $filename);
                $slider->image = $path;
            }
            $slider->save();
            return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully');
    }
}
