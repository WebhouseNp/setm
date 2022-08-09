<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class ProductController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::orderBy('order_row', 'ASC')->paginate(10000);
        return view('product::index', compact('products'));
    }


    public function create()
    {
        return view('product::create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required',
            'product_full_description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000',
            'icon' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000',
            'product_detail_banner' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000'
        ]);
        try {
            $product = new Product;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->product_full_description = $request->product_full_description;
            $product->video = $request->video;
            $product->meta_title = $request->meta_title;
            $product->meta_keyword = $request->meta_keyword;
            $product->meta_description = $request->meta_description;

            $product->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '-image.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/product', $filename);
                $product->image = $path;
            }
            if ($request->hasFile('icon')) {
                $fileIcon = $request->icon;
                $fileIconname = time() . '-icon.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/product', $fileIconname);
                $product->icon = $pathIcon;
            }
            if ($request->hasFile('product_detail_banner')) {
                $fileIcon = $request->product_detail_banner;
                $fileIconname = time() . '-product_detail_banner.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/product', $fileIconname);
                $product->product_detail_banner = $pathIcon;
            }
            $product->save();
            return redirect()->route('product.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product::edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => "required",
            'product_full_description' => "required",
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000'
        ]);
        try {
            $product->title = $request->title;
            $product->description = $request->description;
            $product->product_full_description = $request->product_full_description;
            $product->video = $request->video;
            $product->meta_title = $request->meta_title;
            $product->meta_keyword = $request->meta_keyword;
            $product->meta_description = $request->meta_description;
            $product->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/product', $filename);
                $product->image = $path;
            }
            if ($request->hasFile('icon')) {
                $fileIcon = $request->icon;
                $fileIconname = time() . '.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/product', $fileIconname);
                $product->icon = $pathIcon;
            }
            if ($request->hasFile('product_detail_banner')) {
                $fileIcon = $request->product_detail_banner;
                $fileIconname = time() . '.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/product', $fileIconname);
                $product->product_detail_banner = $pathIcon;
            }
            $product->save();
            return redirect()->route('product.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function updateOrder(Request $request){
        // dd('Hello');
        $data =[];
        foreach($request->data as $row){
            Product::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
