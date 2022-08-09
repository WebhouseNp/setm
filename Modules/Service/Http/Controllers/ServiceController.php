<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Service\Entities\Service;

class ServiceController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::orderBy('order_row', 'ASC')->paginate(1000);
        return view('service::index', compact('services'));
    }

    public function create()
    {
        return view('service::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'service_full_description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {
            $service = new Service;
            $service->title = $request->title;
            $service->video = $request->video;
            $service->description = $request->description;
            $service->service_full_description = $request->service_full_description;
            $service->meta_title = $request->meta_title;
            $service->meta_keyword = $request->meta_keyword;
            $service->meta_description = $request->meta_description;

            $service->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '-image.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/service', $filename);
                $service->image = $path;
            }
            if ($request->hasFile('icon')) {
                $fileIcon = $request->icon;
                $fileIconname = time() . '-icon.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/service', $fileIconname);
                $service->icon = $pathIcon;
            }
            if ($request->hasFile('service_inner_banner')) {
                $fileIcon = $request->service_inner_banner;
                $fileIconname = time() . '-service_inner_banner.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/service', $fileIconname);
                $service->service_inner_banner = $pathIcon;
            }
            $service->save();
            return redirect()->route('service.index')->with('success', 'Service created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('service::edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service =  Service::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'service_full_description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {

            $service->title = $request->title;
            $service->video = $request->video;
            $service->description = $request->description;
            $service->service_full_description = $request->service_full_description;
            $service->meta_title = $request->meta_title;
            $service->meta_keyword = $request->meta_keyword;
            $service->meta_description = $request->meta_description;

            $service->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '-image.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/service', $filename);
                $service->image = $path;
            }
            if ($request->hasFile('icon')) {
                $fileIcon = $request->icon;
                $fileIconname = time() . '-icon.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/service', $fileIconname);
                $service->icon = $pathIcon;
            }
            if ($request->hasFile('service_inner_banner')) {
                $fileIcon = $request->service_inner_banner;
                $fileIconname = time() . '-service_inner_banner.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/service', $fileIconname);
                $service->service_inner_banner = $pathIcon;
            }
            $service->save();
            return redirect()->route('service.index')->with('success', 'Service updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateOrder(Request $request){
        $data =[];
        foreach($request->data as $row){
            Service::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
