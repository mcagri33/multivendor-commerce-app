<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use App\Models\Profile;
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

        $userStore =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);

        $profile = new Profile();
        $profile->user_id = $userStore->id;
        $profile->save();

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

    public function userProfile(Request $request)
    {
        $user = User::find($request->id);
        $profileFind = Profile::where('user_id', '=', $user->id)->first();
        return view('castle.user.detail',compact('profileFind'));
    }

    public function userDetailUpdate(Request $request)
    {
        $profileId = Profile::findOrFail($request->id);
        $profileId->first_name = $request->first_name;
        $profileId->last_name = $request->last_name;
        $profileId->address1 = $request->address1;
        $profileId->address2 = $request->address2;
        $profileId->phone = $request->phone;
        $profileId->company = $request->company;
        $profileId->country = $request->country;
        $profileId->city = $request->city;
        $profileId->state = $request->state;
        $profileId->update();
        return redirect()->route('castle.user.index')->with('success', 'Success Created!');

    }
}
