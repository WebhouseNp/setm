<?php

namespace Modules\Quicklink\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quicklink\Entities\Quicklink;

class QuicklinkController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quicklinks = Quicklink::orderBy('order_row', 'ASC')->paginate(10000);
        return view('quicklink::index', compact('quicklinks'));
    }

    public function create()
    {
        return view('quicklink::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'link' => 'required|max:500',
        ]);
        try {
            $quicklink = new Quicklink;
            $quicklink->title = $request->title;
            $quicklink->link = $request->link;
            $quicklink->publish = $request->publish ? 1 : 0;
            $quicklink->save();
            return redirect()->route('quicklink.index')->with('success', 'Quicklink created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $quicklink = Quicklink::findOrFail($id);
        return view('quicklink::edit', compact('quicklink'));
    }

    public function update(Request $request, $id)
    {
        $quicklink =  Quicklink::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:500',
            'link' => 'required|max:500',
        ]);
        try {

            $quicklink->title = $request->title;
            $quicklink->link = $request->link;
            $quicklink->publish = $request->publish ? 1 : 0;
            $quicklink->save();

            return redirect()->route('quicklink.index')->with('success', 'Quicklink updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateOrder(Request $request){
        $data =[];
        foreach($request->data as $row){
            Quicklink::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $quicklink = Quicklink::findOrFail($id);
        $quicklink->delete();
        return redirect()->route('quicklink.index')->with('success', 'Quicklink deleted successfully');
    }
}
