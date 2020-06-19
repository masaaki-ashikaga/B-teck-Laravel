<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = array('id');

    // public static $rules = array(
    //     'comment' => 'required',
    // );

    // public function changeStatus($submit_task)
    // {
    //     if($submit_task->status == 0)
    //     {
    //         $submit_task->status = 1;
    //         $submit_task->save();
    //         $status = $submit_task->status;
    //     } 
    //     elseif($submit_task->status == 1)
    //     {
    //         $submit_task->status = 0;
    //         $submit_task->save();
    //         $status = $submit_task->status;
    //     }
    //     return $status;
    // }

    public function changeStatus($submit_task)
    {
        $status = $submit_task->status;
        $submit_task->status = !$status;
        $submit_task->update();
        // $status = $submit_task->status;
        return $status;
    }
}
