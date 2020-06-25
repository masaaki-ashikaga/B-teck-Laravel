<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = array('id');

    public function changeStatus($submit_task)
    {
        $status = $submit_task->status;
        $submit_task->status = !$status;
        $submit_task->update();
        return $status;
    }
}
