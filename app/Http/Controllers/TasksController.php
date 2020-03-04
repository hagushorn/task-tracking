<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use App\ExecutorTask;
class TasksController extends Controller
{
    public function submit(Request $req)
    {
        $exTask = new ExecutorTask(); 
        $task = new tasks();
        $task->title = $req->input('title');
        $task->status = $req->input('status');
        $task->save();
        $exTask->idExecutor = $req->input('idExecutor');
        $exTask->idTask = $task->id;
        $exTask->save();
        return \Response::json($task);
    }

    public function deleteRow($id)
    {
        // executortask::find($id)->delete();
        tasks::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
