<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function index()
    {   
      
        $projects = Project::all();
        $users = User::all();
        return view('admin.project_user.index',compact('users','projects'));
      }

    public function create()
    {
    }

    public function store(Request $request,Project $project)
    {
      // $project = Project::findOrFail($id);
      // $project->user()->sync($request->user);
      // return redirect()->route('userproject.index');

    //   $validated = $request->validate([
    //     'user_id' => 'required|exists:users,id',
    // ]);

    //  $project->user()->sync($request->user);
    
    $project->users()->sync($request->user);
        
    return redirect()->route('projects.show', $project->id);
   }

    public function show(ProjectUser $projectuser)
    {
        //
    }

    
    public function edit(ProjectUser $projectuser)
    {
     }


   
    public function update(Request $request, ProjectUser $projectuser)
    {
   }

    
    public function destroy(ProjectUser $projectuser)
    {
   }
}
