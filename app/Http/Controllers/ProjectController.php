<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Partenaire;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {   
        
        $STATUS_LABELS = Project::STATUS_LABELS;
        $projects = Project::with('partenaire')->get();
        return view('admin.projects.index', compact('projects','STATUS_LABELS'));
    }

    public function create()
    {
        $STATUS_LABELS = Project::STATUS_LABELS;
        $partenaires = Partenaire::all();
       return view('admin.projects.create', compact('partenaires','STATUS_LABELS'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project=Project::create($request->all());
        $project->addMediaFromRequest('image')->toMediaCollection('images');
        return redirect()->route('projects.index');
        

    }

    public function show(Project $project)
    {
        //
    }

    
    public function edit(Project $project)
    {
        $STATUS_LABELS = Project::STATUS_LABELS;
        $partenaires = Partenaire::all();
        return view('admin.projects.edit', compact('project','partenaires','STATUS_LABELS'));
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
