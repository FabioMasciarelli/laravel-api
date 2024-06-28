<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(8);

        return view('admin.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $technologies = Technology::all();

        return view('admin.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        
        $data = $request->all();

        if($request->hasFile('upload_file')) {
            $file_path = Storage::put('projects_file', $request->upload_file);
            $data['upload_file'] = $file_path;
        }

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->slug= Str::slug($newProject->title);
        $newProject->save();


        if($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.show', ['project' => $newProject->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $technologies = Technology::all();

        return view('admin.edit', compact('project', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProjectRequest $request, Project $project)
    {
        $data = $request->all();
        $project->update($data);

        $project->technologies()->sync($request->technologies);

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        if($project->upload_file) {
            Storage::delete($project->upload_file);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Il Progetto '. $project->title . ' è stato cancellato');
    }
}
