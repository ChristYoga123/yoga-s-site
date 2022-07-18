<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDashboard()
    {
        $projects = Project::latest()->paginate(5);
        return view('projects.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.project-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:projects',
            'status' => 'required',
            'hero_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
        ]);
        $validator['hero_image'] = $request->file('hero_image')->store('hero_images');
        $project = Project::create($validator);
        return redirect()->route('projects.show', $project->slug)->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::where('slug', $project->slug)->first();
        return view('projects.project-show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::where('slug', $project->slug)->first();
        return view('projects.project-edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project = Project::where('slug', $project->slug)->first();
        $validator = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'status' => 'required',
            'hero_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
        ]);

        if ($request->hasFile('hero_image')) {
            $validator['hero_image'] = $request->file('hero_image')->store('hero_images');
        }
        $project->update($validator);
        return redirect()->route('projects.show', $project->slug)->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project = Project::where('slug', $project->slug)->first();
        $project->delete();
        return redirect()->route('projects.dashboard')->with('success', 'Project deleted successfully');
    }
}
