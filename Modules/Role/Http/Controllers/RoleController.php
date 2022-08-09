<?php

namespace Modules\Role\Http\Controllers;

use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RoleController extends Controller
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('role::index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pers = Permission::select('group')->distinct()->get();
        $permissions = [];
        foreach ($pers as $per) {
            $permissions[] = (object)['group' => $per->group, 'permissions' => Permission::where('group', $per->group)->get()];
        }
        return view('role::create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:20',
            'permissions' => "required|array",
        ]);
        try {
            DB::beginTransaction();
            $role = new Role;
            $role->name = Str::title($request->name);
            $role->guard_name = 'web';
            $role->save();
            $role->syncPermissions($request->permissions);
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Role Created Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('role::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('role::edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:20',
            'permissions' => "required|array",
        ]);
        try {
            DB::beginTransaction();
            $role->name = Str::title($request->name);
            $role->guard_name = 'web';
            $role->save();
            $role->syncPermissions($request->permissions);
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Role Updated Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role Deleted Successfully');
    }
}
