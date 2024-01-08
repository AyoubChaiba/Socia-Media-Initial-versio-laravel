<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\profileRequest;

class profilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store','index','create');
    }

    public function index () {
        $profiles = Profile::paginate(10);
        return view('profiles.list',compact('profiles'));
    }

    public function show (Profile $profile) {
        return view('profiles.show',compact('profile'));
    }

    public function create () {
        return view('profiles.create');
    }

    public function store(profileRequest $request) {
        // insertion
        $formFields = $request->validated();
        // dd($formFields);
        $formFields['password'] = Hash::make($request->password);

        if ($request->hasFile('image')){
            $formFields['image'] =  $this->uploadimage($request);
        }

        $newpublication = Profile::create($formFields);

        return redirect()->route('home.index',$newpublication->id)
        ->with([
            'success' => 'has been created',
            'name' => $request->name ,
        ]);
    }

    public function destroy(Profile $profile) {
        $name = $profile->name;
        $profile->delete();
        return to_route('profiles.index')->with('success', 'has benn delete : '.$name);
    }

    public function edit(Profile $profile) {
        return view('profiles.edite', compact(['profile']));
    }

    public function update(profileRequest $request , Profile $profile) {
        $formFields = $request->validated();

        if (isset($formFields['password'])) {
            $formFields['password'] = bcrypt($formFields['password']);
        }

        if ($request->hasFile('image')){
            $formFields['image'] =  $this->uploadimage($request,$formFields);
        }

        $profile->fill($formFields)->save();
        $name = $profile->name ;
        return to_route('profiles.show',$profile->id)->with('danger', 'has benn uapdate : '.$name);
    }

    private function uploadimage(profileRequest $request){
        return $request->file('image')->store('images/profiles' ,'public');
    }


}

