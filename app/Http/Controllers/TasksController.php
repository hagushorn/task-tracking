<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
class TasksController extends Controller
{
    public function submit(Request $req)
    {
        $tasks = new tasks();
        $tasks->title = $req->input('title');
        $tasks->idExecutor = $req->input('idExecutor');
        $tasks->status = $req->input('status');
        $tasks->save();
        return $tasks;
    }

    public function deleteRow($id)
    {
        tasks::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
