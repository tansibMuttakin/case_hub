<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('is_admin',0)->get();
        return view('users.index')->with('users',$users);
    }

    public function edit(User $user){
        return view('users.edit')->with('user',$user);
    }

    public function update(Request $request, User $user){
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
        if ($user) {
            
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->birth_date = $request->birth_date;
            $user->email = $request->email;
            $user->district_name = $request->district_name;
            $user->reg_date = $request->reg_date;
            $user->last_visit = $request->last_visit;
            $user->is_active = $request->is_active;
            $user->save();
            return redirect()->route('user.index')->with('success','User Profile Updated Successfully');
        }
        else {
            return redirect()->route('user.index')->with('error','User Profile Update failed');
        }
    }
    public function destroy(User $user){
        if ($user) {
            $user->delete();
            return redirect()->route('user.index')->with('succecss','User deleted successfully');
        }
        else {
            return redirect()->route('user.index')->with('error','User deletion failed');
        }
    }
}
