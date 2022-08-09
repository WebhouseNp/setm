<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Department\Entities\Department;

class DepartmentController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $departments = Department::orderBy('order_row', 'ASC')->paginate(10000);
        return view('department::index', compact('departments'));
    }


    public function create()
    {
        return view('department::create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'link' => 'required|max:50',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000',
            'icon' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000'
        ]);
        try {
            $department = new Department;
            $department->title = $request->title;
            $department->link = $request->link;
            $department->description = $request->description;
            $department->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '-image.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/department', $filename);
                $department->image = $path;
            }
            if ($request->hasFile('icon')) {
                $fileIcon = $request->icon;
                $fileIconname = time() . '-icon.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/department', $fileIconname);
                $department->icon = $pathIcon;
            }
            $department->save();
            return redirect()->route('department.index')->with('success', 'Associated Partners created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('department::edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:50',
            'link' => 'required|max:50',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000'
        ]);
        try {
            $department->title = $request->title;
            $department->link = $request->link;
            $department->description = $request->description;
            $department->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/department', $filename);
                $department->image = $path;
            }
            if ($request->hasFile('icon')) {
                $fileIcon = $request->icon;
                $fileIconname = time() . '.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/department', $fileIconname);
                $department->icon = $pathIcon;
            }
            $department->save();
            return redirect()->route('department.index')->with('success', 'Associated Partners updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function updateOrder(Request $request){
        $data =[];
        foreach($request->data as $row){
            Department::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('department.index')->with('success', 'Associated Partners deleted successfully');
    }
}
