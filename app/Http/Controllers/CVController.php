<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Technology;
use App\Models\cv_technologies;
use App\Http\Requests\StoreCVRequest;
use App\Http\Requests\UpdateCVRequest;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cv = CV::all();
        return view('index', compact('cv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        return view('create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCVRequest $request)
    {
        $photo = Storage::disk('public')->put('photo', $request->photo);
        $tab = [
            'nom_prenom' => $request->nom_prenom,
            'email' => $request->email,
            'niveau_francais' => $request->niveau_francais,
            'niveau_anglais' => $request->niveau_anglais,
            'annee_experience' => $request->experience,
            'sexe' => $request->sexe,
            'preference' => $request->preference,
            'photo' => $photo
        ];
        $cv = CV::create($tab);
        $technologies = Technology::all();
        foreach ($technologies as $technologie) {
            $id = $technologie->id;
            if ($request->input($id)) {
                cv_technologies::create([
                    'c_v_id' => $cv->id,
                    'technology_id' => $id
                ])->saveOrFail();
            }
        }
        return redirect()->route('cv.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CV $cv)
    {
        return view('show', compact('cv'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CV $cv)
    {
        $technologies = Technology::all();
        $mes_technologies = cv_technologies::where('c_v_id', $cv->id)->get();
        return view('edit', compact('cv', 'technologies', 'mes_technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCVRequest $request, CV $cv)
    {
        $photo = $cv->photo;
        if (isset($request->photo)) {
            Storage::disk('public')->delete('photo', $photo);
            $photo = Storage::disk('public')->put('photo', $request->photo);
        }
        $cv->update ([
            'nom_prenom' => $request->nom_prenom,
            'email' => $request->email,
            'niveau_francais' => $request->niveau_francais,
            'niveau_anglais' => $request->niveau_anglais,
            'annee_experience' => $request->experience,
            'sexe' => $request->sexe,
            'preference' => $request->preference,
            'photo' => $photo
        ]);
        $mes_technologies = cv_technologies::where('c_v_id', $cv->id)->delete();
        $technologies = Technology::all();
        foreach ($technologies as $technologie) {
            $id = $technologie->id;
            if ($request->input($id)) {
                cv_technologies::create([
                    'c_v_id' => $cv->id,
                    'technology_id' => $id
                ])->saveOrFail();
            }
        }
        return redirect()->route('cv.show', $cv);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CV $cv)
    {
        $photo = $cv->photo;
        Storage::disk('public')->delete('photo', $photo);
        $mes_technologies = cv_technologies::where('c_v_id', $cv->id)->delete();
        $cv->delete();
        return redirect()->route('cv.index');
    }
}
