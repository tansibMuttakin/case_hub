<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(){
        $user = User::find(auth()->id());
        return view('profile.show')->with('user', $user);
    }

    public function edit()
    {
        $user = User::find(auth()->id());
        return view('profile.edit')->with('user', $user);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' =>'required|string',
            'last_name'=>'required|string',
            'email' =>'required',
            'birth_date' =>'required|date',
            'district_name'=>'required|string',
            'reg_date' =>'required|date',
            'last_visit' =>'required|date',
            'is_active' => 'required'


        ]);
        $user = User::find(auth()->id());
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->district_name = $request->district_name;
        $user->reg_date = $request->reg_date;
        $user->last_visit = $request->last_visit;
        $user->is_active = $request->is_active;
        $user->save();

        return redirect()->route('profile.show')->with('success','Profile Updated Successfully');
    }

    public function password(Request $request)
    {
        $validated = $request->validate([
            'old_password'=>'required|string|current_password',
            'password_confirmation'=>'required|string',
            'password' =>'required|string|confirmed'
        ]);
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->with('success','Password Updated Successfully');
    }
}
