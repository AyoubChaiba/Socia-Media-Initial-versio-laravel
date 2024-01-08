<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\profileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use PhpParser\ErrorHandler\Collecting;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return ProfileResource::Collection($profiles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(profileRequest $request)
    {
        $formFiles = $request->validated();
        // dd($formFiles);

        if (isset($formFiles['password'])) {
            $formFiles['password'] = bcrypt($formFiles['password']);
        }

        if ($request->hasFile('image')){
            $formFiles['image'] =  $this->uploadimage($request);
        }

        $profile = Profile::create($formFiles);

        return new ProfileResource($profile) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $formFiles = $request->all();

        if (isset($formFiles['password'])) {
            $formFiles['password'] = bcrypt($formFiles['password']);
        }
        if ($request->hasFile('image')){
            $formFields['image'] =  $this->uploadimage($request,$formFiles);
        }

        $profile->fill($formFiles)->save();

        return new ProfileResource($profile) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json([
            'id' => $profile->id,
            'message' => "$profile->name is delete"
        ]) ;
    }

    private function uploadimage(profileRequest $request){
        return $request->file('image')->store('images/profiles' ,'public');
    }
}
