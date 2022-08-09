<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Entities\Team;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teams  = Team::orderBy('order_row', 'ASC')->paginate(1000);
        return view('team::index', compact('teams'));
    }


    public function create()
    {
        return view('team::create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'position' => "required|max:50",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000',
            'email' => 'required|email|max:100',

        ]);
        try {
            $team = new Team;
            $team->name = $request->name;
            $team->position = $request->position;
            $team->content = $request->content;
            $team->contact = $request->contact;
            $team->email = $request->email;
            $team->location = $request->location;
            $team->facebook = $request->facebook;
            $team->twitter = $request->twitter;
            $team->instagram = $request->instagram;

            $team->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/teams', $filename);
                $team->image = $path;
            }

            $team->save();
            return redirect()->route('team.index')->with('success', 'Team created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('team::edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:50',
            'position' => "required|max:50",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000',
            'email' => 'required|email|max:100',
            'contact' => 'required|max:100'
        ]);
        try {

            $team->name = $request->name;
            $team->position = $request->position;
            $team->content = $request->content;
            $team->contact = $request->contact;
            $team->email = $request->email;
            $team->location = $request->location;
            $team->facebook = $request->facebook;
            $team->twitter = $request->twitter;
            $team->instagram = $request->instagram;
            $team->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/teams', $filename);
                $team->image = $path;
            }

            $team->save();
            return redirect()->route('team.index')->with('success', 'Team created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function updateOrder(Request $request){
        $data =[];
        foreach($request->data as $row){
            Team::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('team.index')->with('success', 'Team deleted successfully');
    }
}
