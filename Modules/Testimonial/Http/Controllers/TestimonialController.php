<?php

namespace Modules\Testimonial\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Testimonial\Entities\Testimonial;

class TestimonialController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $testimonials = Testimonial::orderBy('order_row', 'ASC')->paginate(100);
        return view('testimonial::index', compact('testimonials'));
    }

    public function create()
    {
        return view('testimonial::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000'
        ]);
        try {
            $testimonial = new Testimonial;
            $testimonial->name = $request->name;
            $testimonial->description = $request->description;
            $testimonial->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/testimonial', $filename);
                $testimonial->image = $path;
            }
            $testimonial->save();
            return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonial::edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:50',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000'
        ]);
        try {
            $testimonial->name = $request->name;
            $testimonial->description = $request->description;
            $testimonial->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/testimonial', $filename);
                $testimonial->image = $path;
            }
            $testimonial->save();
            return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateOrder(Request $request){
        $data =[];
        foreach($request->data as $row){
            Testimonial::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully');
    }
}
