<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects= Project::all();
        return view('admin.projects.index');
    }

    public function create()
    {
       return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $project=Project::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'status'=>$request->status,

        ]);
        $project->addMediaFromRequest('profile')->toMediaCollection('images');
        return to_route('admin.projects.index');


    }

    public function show(Project $project)
    {
        //
    }

    
    public function edit(Project $project)
    {
        $partenaires = Partenaire::all();
        return view('admin.projects.edit', compact('project','partenaires'));
    }


   
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('projects.index');
    }

    
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
