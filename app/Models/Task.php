<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'start_date',
        'end_date',
        'estimation',
        'active',
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
