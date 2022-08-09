<?php

namespace Modules\Partner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Partner\Entities\Partner;

class PartnerController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $partners = Partner::orderBy('order_row', 'ASC')->paginate(100000);
        return view('partner::index', compact('partners'));
    }


    public function create()
    {

        return view('partner::create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:7000'
        ]);
        try {
            $partner = new Partner;
            $partner->title = $request->title;
            $partner->country = $request->country;
            $partner->city = $request->city;
            $partner->description = $request->description;
            $partner->partner_link = $request->partner_link;
            $partner->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/partner', $filename);
                $partner->image = $path;
            }
            $partner->save();
            return redirect()->route('partner.index')->with('success', 'Partner created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('partner::edit', compact('partner'));
    }


    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:500',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:7000'
        ]);
        try {
            $partner->title = $request->title;
            $partner->country = $request->country;
            $partner->city = $request->city;
            $partner->description = $request->description;
            $partner->partner_link = $request->partner_link;
            $partner->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/partner', $filename);
                $partner->image = $path;
            }
            $partner->save();
            return redirect()->route('partner.index')->with('success', 'Partner updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateOrder(Request $request){
        // dd('Hello');
        $data =[];
        foreach($request->data as $row){
            Partner::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect()->route('partner.index')->with('success', 'Partner deleted successfully');
    }
}
