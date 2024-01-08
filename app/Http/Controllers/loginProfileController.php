<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginProfileController extends Controller
{
    public function index() {
        return view('profiles.login');
    }

    public function store(Request $request) {
        $email = $request->email ;
        $password = $request->password ;

        $values = ['email' => $email ,'password' => $password ];
        if (Auth::attempt($values)) {
            $request->session()->regenerate();
            return to_route('home.index')->with('success' , 'vous etes bine connecte : '.$email.'.');
        }else {
            return back()->withErrors([
                'email' => 'email and mod passe incorrect. '
            ])->onlyInput('email');
        }
    }
    public function delete() {
        Session::flush();
        Auth::logout();
        return to_route('login.index')->with('success' , 'vous êtes bien déconnecté');
    }
}
