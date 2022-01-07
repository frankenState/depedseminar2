<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function edit(){
        $user = Auth::user();

        return view('auth.editprofile', ['user' => $user]);
    }

    public function update(Request $request){
        $result = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'bio' => 'required|string',
            'avatar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'email' => 'required|string|email|max:255',
        ]);
        
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')){
            // deleting the old image
            Storage::delete('public/avatars/'.$user->avatar);
            $user->avatar = "{$request->email}.{$request->avatar->extension()}";
            $request->avatar->storeAs('public/avatars', $user->avatar);
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();

        return redirect()->route('edit-profile')->with('status', [
            'type' => 'success',
            'message' => 'Your profile was successfully updated.'
        ]);
    }
}
