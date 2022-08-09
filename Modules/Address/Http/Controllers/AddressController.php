<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\Address;

class AddressController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $addresss = Address::orderBy('order_row', 'ASC')->paginate(10);
        return view('address::index', compact('addresss'));
    }


    public function create()
    {
        return view('address::create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email1' => 'required',
            'phone' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000',
        ]);
        try {
            $address = new Address;
            $address->country = $request->country;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->email1 = $request->email1;
            $address->email2 = $request->email2;
            $address->phone = $request->phone;
            $address->phone2 = $request->phone2;
            $address->map_link = $request->map_link;

            $address->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '-image.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/address', $filename);
                $address->image = $path;
            }
            $address->save();
            return redirect()->route('address.index')->with('success', 'Address created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('address::edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $this->validate($request, [
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email1' => 'required',
            'phone' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2000',
        ]);
        try {
            $address->country = $request->country;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->email1 = $request->email1;
            $address->email2 = $request->email2;
            $address->phone = $request->phone;
            $address->phone2 = $request->phone2;
            $address->map_link = $request->map_link;

            $address->publish = $request->publish ? 1 : 0;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/address', $filename);
                $address->image = $path;
            }
            $address->save();
            return redirect()->route('address.index')->with('success', 'Address updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function updateOrder(Request $request){
        // dd('Hello');
        $data =[];
        foreach($request->data as $row){
            Address::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
        }
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('address.index')->with('success', 'Address deleted successfully');
    }
}
