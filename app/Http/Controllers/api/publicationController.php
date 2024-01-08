<?php

namespace App\Http\Controllers\api;

use App\Models\publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\publicationRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PublicatonResource;

class publicationController extends Controller
{

    public function index()
    {
        $publications = Publication::all();
        return (PublicatonResource::collection($publications));
    }

    public function store(publicationRequest $request)
    {
        $formfiles = $request->validated();

        if ($request->hasFile('image')) {
            $formfiles['image'] = $this->uploadimage($request, $formfiles);
        }

        $newPublication = new PublicatonResource(publication::create($formfiles));
        return $newPublication;
    }


    /**
     * Display the specified resource.
     */
    public function show(publication $publication)
    {
        return new PublicatonResource($publication);
    }

    public function update(Request $request, Publication $publication)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'body' => 'nullable' ,
            'image' => 'nullable' ,
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images/profiles' ,'public');
        }

        $publication->update($validatedData);

        return response()->json(['message' => 'Publication updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publication $publication)
    {
        $publication->delete();
        return response()->json([
            'id' => $publication->id,
            'name' => $publication->name,
            'email' => $publication->email,
            'message' => "$publication->name is delete"
        ]) ;
    }


    private function uploadimage(publicationRequest $request, $formfiles){
        return $request->file('image')->store('images/profiles' ,'public');
    }

}
