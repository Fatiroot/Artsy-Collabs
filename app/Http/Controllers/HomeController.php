<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $STATUS_LABELS = Project::STATUS_LABELS;
        $projects = Project::where('status', 1)->with('partenaire')->get();
        return view('home', compact('projects','STATUS_LABELS'));
    }

    
}
