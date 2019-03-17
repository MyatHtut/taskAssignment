<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function priority()
    {
        return $this->belongsTo('App\Prioritiy');
    }

    public function tasksType()
    {
        return $this->belongsTo('App\TaskType', 'task_type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_user_id', 'id');
    }

    public function createUser()
    {
        return $this->belongsTo('App\User', 'created_user_id', 'id');
    }

    public function assignedTo()
    {
        return $this->belongsTo('App\User', 'assigned_id', 'id');
    }

    public function contactUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
