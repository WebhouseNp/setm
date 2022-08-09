<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Blog;

class BlogController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::orderBy('order_row', 'ASC')->paginate(10000);
        return view('blog::index', compact('blogs'));
    }

    public function create()
    {
        return view('blog::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'blog_full_description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {
            $blog = new Blog;
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->blog_full_description = $request->blog_full_description;
            $blog->meta_title = $request->meta_title;
            $blog->meta_keyword = $request->meta_keyword;
            $blog->meta_description = $request->meta_description;
            $blog->publish = $request->publish ? 1 : 0;
            $blog->author = $request->author;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/blog', $filename);
                $blog->image = $path;
            }
            if ($request->hasFile('blog_inner_banner')) {
                $file = $request->blog_inner_banner;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/blog', $filename);
                $blog->blog_inner_banner = $path;
            }
            $blog->save();
            return redirect()->route('blog.index')->with('success', 'Blog created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog::edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog =  Blog::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:500',
            'description' => "required",
            'blog_full_description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:5000'
        ]);
        try {

            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->blog_full_description = $request->blog_full_description;
            $blog->meta_title = $request->meta_title;
            $blog->meta_keyword = $request->meta_keyword;
            $blog->meta_description = $request->meta_description;
            $blog->publish = $request->publish ? 1 : 0;
            $blog->author = $request->author;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/blog', $filename);
                $blog->image = $path;
            }
            if ($request->hasFile('blog_inner_banner')) {
                $file = $request->blog_inner_banner;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $file, 'public');
                $path = $file->storeAs('public/blog', $filename);
                $blog->blog_inner_banner = $path;
            }
            $blog->save();
            return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateOrder(Request $request){
        $data =[];
        foreach($request->data as $row){
            Blog::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully');
    }
}
