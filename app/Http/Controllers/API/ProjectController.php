<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\ProjectsTask;
use App\Models\User;
use App\Models\UsersProject;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('active', 1)->with('users', 'tasks', 'fee', 'status')->get();
        return response($projects, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $newProject = Project::create($request->validated());
        foreach($request->validated()['users'] as $user){
            UsersProject::create([
                'project_id' => $newProject->id,
                'user_id' => $user
            ]);
        }
        foreach($request->validated()['tasks'] as $task){
            ProjectsTask::create([
                'project_id' => $newProject->id,
                'task_id' => $task
            ]);
        }
        $newProject->users;
        $newProject->fee;
        $newProject->tasks;
        $newProject->status;
        return response(['project' => $newProject], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->users;
        $project->tasks;
        $project->fee;
        $project->status;  
        return response(['project' => $project], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        $project->save();

        $userProjects = $project->userProjects();
        $userProjects->delete();

        foreach($request->validated()['users'] as $user){
            UsersProject::create([
                'project_id' => $project->id,
                'user_id' => $user
            ]);
        }

        $projectsTasks = $project->projectsTasks();
        $projectsTasks->delete();

        foreach($request->validated()['tasks'] as $task){
            ProjectsTask::create([
                'project_id' => $project->id,
                'task_id' => $task
            ]);
        }

        $project->users;
        $project->fee;
        $project->tasks;
        $project->status;
        return response(['project' => $project], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->active = 0;
        $project->save();
        return response(true, 200);
    }

    public function listByUser(User $user)
    {
        $projects = Project::where('active', 1)->whereHas('users' , function($query) use ($user){
            $query->where('user_id', $user->id);
        })->with('tasks.status', 'fee', 'status')->get();        
        return response($projects, 200);
    }
}
