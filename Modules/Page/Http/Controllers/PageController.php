<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Page\Entities\Page;

class PageController extends Controller
{
    public $readonlyslugpages;
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        //page slug can not be edited if the page slug is inside this array
       $this->readonlyslugpages = ['terms-of-service', 'privacy-policy'];
    }

    public function index()
    {
        $pages = Page::orderBy('updated_at', 'DESC')->paginate(10000);
        //to display delete buttom only if user have created the page
        $readonlyslug = $this->readonlyslugpages;
        return view('page::index', compact('pages','readonlyslug'));
    }

    public function create()
    {
        return view('page::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'page_full_description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {
            $page = new Page;
            $page->title = $request->title;
            $page->description = $request->description;
            $page->page_full_description = $request->page_full_description;
            $page->meta_title = $request->meta_title;
            $page->meta_keyword = $request->meta_keyword;
            $page->meta_description = $request->meta_description;
            $page->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/page', $filename);
                $page->image = $path;
            }
            if ($request->hasFile('page_banner')) {
                $file = $request->page_banner;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/page', $filename);
                $page->page_banner = $path;
            }
            $page->save();
            return redirect()->route('page.index')->with('success', 'Page created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        //to display delete buttom only if user have created the page
        $readonlyslug = $this->readonlyslugpages;
        return view('page::edit', compact('page','readonlyslug'));
    }

    public function update(Request $request, $id)
    {
        $page =  Page::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'page_full_description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {

            $page->title = $request->title;
            $page->description = $request->description;
            $page->page_full_description = $request->page_full_description;
            $page->meta_title = $request->meta_title;
            $page->meta_keyword = $request->meta_keyword;
            $page->meta_description = $request->meta_description;
            $page->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/page', $filename);
                $page->image = $path;
            }
            if ($request->hasFile('page_banner')) {
                $file = $request->page_banner;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/page', $filename);
                $page->page_banner = $path;
            }
            $page->save();
            return redirect()->route('page.index')->with('success', 'Page updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('page.index')->with('success', 'Page deleted successfully');
    }
}
