<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class CastleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('castle.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('castle.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);
        return redirect()->route('castle.user.index')->with('success', 'Success Created!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $userFind = User::find($id);
        return view('castle.user.edit',compact('userFind'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email'.$user->id,
        ]);

        $userId = User::findOrFail($request->id);
        $userId->name = $request->name;
        $userId->email = $request->email;
        $userId->password = Hash::make($request->password);
        $userId->status = $request->status;
        $userId->update();
        return redirect()->route('castle.user.index')->with('success', 'Success Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $userDelete = User::find($id);
        $userDelete->delete();
        return redirect()->route('castle.user.index')->with('success', 'Success Created!');

    }

    public function changePass($id)
    {
        $passFind = User::find($id);
        return view('castle.user.change_pass',compact('passFind'));
    }

    public function changePassStore(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);
        $passId = User::findOrFail($request->id);
        $passId->password = Hash::make($request->password);
        $passId->update();
        return redirect()->route('castle.user.index')->with('success', 'Success Created!');
    }
}
