<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Client\Entities\Client;

class ClientController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::orderBy('updated_at', 'DESC')->paginate(10000);
        return view('client::index', compact('clients'));
    }

    public function create()
    {
        return view('client::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:500',
            'address' => 'required|max:500',
            'country' => 'required|max:500',
        ]);
        try {
            $client = new Client;
            $client->name = $request->name;
            $client->address = $request->address;
            $client->country = $request->country;

            $client->publish = $request->publish ? 1 : 0;

            if ($request->hasFile('icon')) {
                $fileIcon = $request->icon;
                $fileIconname = time() . '-icon.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/client', $fileIconname);
                $client->icon = $pathIcon;
            }
            $client->save();
            return redirect()->route('client.index')->with('success', 'Client created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client::edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client =  Client::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:500',
            'address' => 'required|max:500',
            'country' => 'required|max:500',
        ]);
        try {

            $client->name = $request->name;
            $client->address = $request->address;
            $client->country = $request->country;

            $client->publish = $request->publish ? 1 : 0;
            
            if ($request->hasFile('icon')) {
                $fileIcon = $request->icon;
                $fileIconname = time() . '-icon.' . $fileIcon->getClientOriginalExtension();
                // $path = Storage::put('public/teams', $fileIcon, 'public');
                $pathIcon = $fileIcon->storeAs('public/client', $fileIconname);
                $client->icon = $pathIcon;
            }
            $client->save();
            return redirect()->route('client.index')->with('success', 'Client updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index')->with('success', 'Client deleted successfully');
    }
}
