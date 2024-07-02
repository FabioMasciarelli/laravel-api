<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with(['type', 'technologies'])->paginate(2);

        $data = [
            'results' => $projects
        ];

        return response()->json($data);
    }

    public function show(string $slug)
    {

        $project = Project::with(['type', 'technologies'])->where('slug', $slug)->first();

        if(!$project) {
            return response()->json([], 404);
        }

        $data = [
            'results' => $project
        ];

        return response()->json($data);
    }
}
