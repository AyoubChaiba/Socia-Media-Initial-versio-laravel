<?php

namespace App\Http\Controllers\api;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\profileRequest;
use App\Http\Resources\loginProfileResources;

class loginProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $login = Auth::attempt($formData);

        if ($login) {
            return new LoginProfileResources(auth()->user());
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

    }

    public function destroy(Profile $profile)
    {
        Auth::logout();
        return response()->json([
            'message' => "is logout"
        ]) ;;
    }
}
