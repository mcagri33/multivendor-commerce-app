<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CastleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $admins = Admin::all();
        return view('castle.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('castle.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        Admin::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'image' => $request->image,
        ]);
        return redirect()->route('castle.admin.index')->with('success', 'Success Created!');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $adminEdit = Admin::find($id);
        return view('castle.admin.edit',compact('adminEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $adminId = Admin::findOrFail($request->id);
        $adminId->uuid = Str::uuid();
        $adminId->name = $request->name;
        $adminId->email = $request->email;
        $adminId->password = Hash::make($request->password);
        $adminId->type = $request->type;
        $adminId->image = $request->image;
        $adminId->status = $request->status;
        $adminId->update();

        return redirect()->route('castle.admin.index')->with('success', 'Success Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $adminDelete = Admin::find($id);
        $adminDelete->delete();
        return redirect()->route('castle.admin.index')->with('success', 'Success Deleted!');
    }
}
