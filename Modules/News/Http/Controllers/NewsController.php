<?php

namespace Modules\News\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\News\Entities\News;

class NewsController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $newses = News::orderBy('updated_at', 'DESC')->paginate(5);
        return view('news::index', compact('newses'));
    }

    public function create()
    {

        return view('news::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {
            $news = new News;
            $news->title = $request->title;
            $news->type = $request->type;
            $news->short_description = $request->short_description;
            $news->description = $request->description;
            $news->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/news', $filename);
                $news->image = $path;
            }
            $news->save();
            return redirect()->route('news.index')->with('success', 'Blog created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news::edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news =  News::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {

            $news->title = $request->title;
            $news->type = $request->type;
            $news->short_description = $request->short_description;
            $news->description = $request->description;
            $news->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/news', $filename);
                $news->image = $path;
            }
            $news->save();
            return redirect()->route('news.index')->with('success', 'News updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
}
