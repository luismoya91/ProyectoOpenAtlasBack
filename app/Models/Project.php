<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'fee_id',
        'status_id',
        'status',
        'start_date',
        'end_date',
        'active',
    ];

    public function users(){
        return $this->hasManyThrough(User::class, UsersProject::class, 'project_id', 'id', 'id', 'user_id');
    }

    public function userProjects(){
        return $this->hasMany(UsersProject::class);
    }

    public function projectsTasks(){
        return $this->hasMany(ProjectsTask::class);
    }

    public function tasks(){
        return $this->hasManyThrough(Task::class, ProjectsTask::class, 'project_id', 'id', 'id', 'task_id');
    }

    public function fee(){
        return $this->belongsTo(Fee::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
