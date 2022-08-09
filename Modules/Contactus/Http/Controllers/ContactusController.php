<?php

namespace Modules\Contactus\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contactus\Entities\Contactus;
use Modules\Frontend\Entities\Subscribe;


class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $contactuss = Contactus::where('type', 'Contact')->orderBy('updated_at', 'DESC')->paginate(1000000);
        return view('contactus::contact', compact('contactuss'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function productInquiry()
    {
        $contactuss = Contactus::where('type', 'Product Inquire')->orderBy('updated_at', 'DESC')->paginate(1000000);
        return view('contactus::productInquiry', compact('contactuss'));
        // return view('contactus::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function serviceInquiry()
    {
        $contactuss = Contactus::where('type', 'Service Inquire')->orderBy('updated_at', 'DESC')->paginate(1000000);
        return view('contactus::serviceInquiry', compact('contactuss'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contactus::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $contact = Contactus::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function subscribe()
    {
        $subscribes = Subscribe::orderBy('updated_at', 'DESC')->paginate(1000000);
        // dd($subscribes);
        return view('contactus::subscribeList', compact('subscribes'));
    }
    public function destroySubscribe($id)
    {
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function viewProduct(Request $request)
    {
        // dd($request->id);
        $detail = Contactus::findOrFail($request->id);
        return view('contactus::previewProduct', compact('detail'));
    }

    public function viewService(Request $request)
    {
        // dd($request->id);
        $detail = Contactus::findOrFail($request->id);
        return view('contactus::previewService', compact('detail'));
    }

    public function viewContact(Request $request)
    {
        // dd($request->id);
        $detail = Contactus::findOrFail($request->id);
        return view('contactus::previewContact', compact('detail'));
    }
}
