<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use App\Http\Requests\StorePartenaireRequest;
use App\Http\Requests\UpdatePartenaireRequest;

class PartenaireController extends Controller
{
    public function index()
    {
        $partenaires=Partenaire::all();
        return view('admin.partenaires.index',compact('partenaires'));
    
    }

    public function create()
    {
       return view('admin.partenaires.create');
    }

    public function store(StorePartenaireRequest $request )
    {
        $partenaire = Partenaire::create($request->all());
        $partenaire->addMediaFromRequest('image')->toMediaCollection('images');
        return redirect()->route('partenaires.index');
    }

    public function show(Partenaire $partenaire)
    {
        //
    }

    
    public function edit(Partenaire $partenaire)
    {
        return view('admin.partenaires.edit', compact('partenaire'));
        }

   
    public function update(UpdatePartenaireRequest $request, Partenaire $partenaire)
    {
        $partenaire->update($request->all());
        return redirect()->route('partenaires.index');
    }

    
    public function destroy(Partenaire $partenaire)
    {
        $partenaire->delete();
        return redirect()->route('partenaires.index');
    }
}
