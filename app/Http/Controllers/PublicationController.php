<?php

namespace App\Http\Controllers;

use App\Http\Requests\publicationRequest;
use App\Models\publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(publication $request)
    {
        $publication = publication::latest()->get();
        return view('publication.list',compact('publication'));
    }

    public function create()
    {
        return view('publication.Create');
    }

    public function store(publicationRequest $request)
    {
        $formfiles = $request->validated();
            $formfiles['id_profile'] = Auth::user()->id;
            if ($request->hasFile('image')) {
                $formfiles['image'] = $this->UpdateImage($request);
            }
        $newPublication = publication::create($formfiles);
        return redirect()->route('publication.show', $newPublication->id)
        ->with('success', 'Publication created successfully');
    }

    public function show(publication $publication)
    {
        return view('publication.Show',compact('publication'));
    }

    public function edit(publication $publication)
    {
        Gate::authorize('update-publication',$publication);
        return view('publication.edit',compact('publication'));
    }

    public function update(publicationRequest $request, publication $publication)
    {
        $formfiles = $request->validated();
            if ($request->hasFile('image')) {
                $formfiles['image'] = $this->UpdateImage($request);
            }
            // dd($publication->id);
        $publication->fill($formfiles)->save();
        return to_route('publication.show',$publication->id)
        ->with('success','then update publication');
    }

    public function destroy(publication $publication)
    {
        $publication->delete();
        return to_route('publication.index')->with('success','then delete publication');
    }

    private function UpdateImage($request){
        return $request->file('image')->store('images/publications','public');
    }
}
