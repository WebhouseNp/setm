<?php

namespace Modules\WorkingProcess\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\WorkingProcess\Entities\WorkingProcess;

class WorkingProcessController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $workingprocesses = WorkingProcess::orderBy('created_at', 'ASC')->paginate(100);
        return view('workingprocess::index', compact('workingprocesses'));
    }


    public function create()
    {

        return view('workingprocess::create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:7000'
        ]);
        try {
            $workingprocess = new WorkingProcess;
            $workingprocess->title = $request->title;
            $workingprocess->description = $request->description;
            $workingprocess->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/workingprocess', $filename);
                $workingprocess->image = $path;
            }
            $workingprocess->save();
            return redirect()->route('workingprocess.index')->with('success', 'WorkingProcess created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $workingprocess = WorkingProcess::findOrFail($id);
        return view('workingprocess::edit', compact('workingprocess'));
    }


    public function update(Request $request, $id)
    {
        $workingprocess = WorkingProcess::findOrFail($id);
        $this->validate($request, [
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:7000'
        ]);
        try {
            $workingprocess->title = $request->title;
            $workingprocess->description = $request->description;
            $workingprocess->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/workingprocess', $filename);
                $workingprocess->image = $path;
            }
            $workingprocess->save();
            return redirect()->route('workingprocess.index')->with('success', 'WorkingProcess updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $workingprocess = WorkingProcess::findOrFail($id);
        $workingprocess->delete();
        return redirect()->route('workingprocess.index')->with('success', 'WorkingProcess deleted successfully');
    }
}
