<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
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

    public function profile(){
        $user = Auth::user();

        return view('users.profile', [ 'user' => $user]);
    }

    public function update(Request $request){

        // dd($request);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'contact_num' => ['required', 'string', 'max:255'],
            'alt_contact_num' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg','max:2048'],
        ]);

      //  dd($request);
        $user = User::find( Auth::user()->id );
       // dd($user);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->contact_num = $request->contact_num;
        $user->alt_contact_num = $request->alt_contact_num;
        
        $avatar = "{$request->email}.{$request->avatar->extension()}";
        $request->avatar->storeAs('public/avatars', $avatar);

        $user->avatar = $avatar;
        $user->save();

        return redirect()->route('profile')->with('status', [
            'class' => 'success',
            'message' => 'The user was updated successfully.'
        ]);

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('users.dashboard', ['user' => $user]);
    }
}
