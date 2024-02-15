<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    // public function index()
    // {   
      
    //     $projects = Project::all();
    //     $users = User::all();
    //     return view('admin.project_user.index',compact('users','projects'));
    //   }

    public function create()
    {
    }

    public function store(Request $request,Project $project)
    {
     
    $project->users()->syncWithoutDetaching($request->user);
        
    return redirect()->route('projects.show', $project->id);
   }

    public function collaborate(Request $request, User $user)
    {
     
      $user->projects()->syncWithoutDetaching([$request->project_id => ['status'=>1]]);
      return redirect()->route('home', $request->project_id);

    }

    
    public function show()
{
  // $projectusers = ProjectUser::with('user','project')->get();
  $projectusers = ProjectUser::all();
  return view('admin.project_user.index',compact('projectusers'));

}


   
    public function update($projectuserId)
    {
      $projectuser = ProjectUser::find($projectuserId);
      if($projectuser){
        if($projectuser->status){
          $projectuser->status=0;
        }else{
          $projectuser->status=1;
        }
        $projectuser->save();
      }
      return back();
   }

    
    public function destroy($projectUserId)
    {
      $projectuser = ProjectUser::find($projectUserId);
      $projectuser->delete();
      return back();
       }
}
