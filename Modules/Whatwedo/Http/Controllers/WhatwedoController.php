<?php

namespace Modules\Whatwedo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Whatwedo\Entities\Whatwedo;

class WhatwedoController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $whatwedos = Whatwedo::orderBy('updated_at', 'ASC')->paginate(10);
        return view('whatwedo::index', compact('whatwedos'));
    }

    public function create()
    {
        return view('whatwedo::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {
            $whatwedo = new Whatwedo;
            $whatwedo->title = $request->title;
            $whatwedo->short_description = $request->short_description;
            $whatwedo->description = $request->description;

            $whatwedo->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/whatwedo', $filename);
                $whatwedo->image = $path;
            }
            if ($request->hasFile('banner_image')) {
                $file = $request->banner_image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/whatwedo', $filename);
                $whatwedo->banner_image = $path;
            }
            $whatwedo->save();
            return redirect()->route('whatwedo.index')->with('success', 'Whatwedo created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $whatwedo = Whatwedo::findOrFail($id);
        return view('whatwedo::edit', compact('whatwedo'));
    }

    public function update(Request $request, $id)
    {
        $whatwedo =  Whatwedo::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {

            $whatwedo->title = $request->title;
            $whatwedo->short_description = $request->short_description;
            $whatwedo->description = $request->description;

            $whatwedo->publish = $request->publish ? 1 : 0;

            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/whatwedo', $filename);
                $whatwedo->image = $path;
            }
            if ($request->hasFile('banner_image')) {
                $file = $request->banner_image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/whatwedo', $filename);
                $whatwedo->banner_image = $path;
            }
            $whatwedo->save();
            return redirect()->route('whatwedo.index')->with('success', 'Whatwedo updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $whatwedo = Whatwedo::findOrFail($id);
        $whatwedo->delete();
        return redirect()->route('whatwedo.index')->with('success', 'Whatwedo deleted successfully');
    }
}
