<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use App\Executors;
class TasksController extends Controller
{
    public function submit(Request $req)
    {
        $task = new tasks();
        $task->title = $req->input('title');
        $task->status = $req->input('status');
        $task->save();
        $task->executors()->attach($req->input('idExecutor'));
        return \Response::json(
        ['id'=>$task->id,
        'title'=>$req->input('title'),
        'status'=>$req->input('status'),
        'name'=>$task->executors()->pluck('name')->implode(', ')]);
    }

    public function search(Request $req)
    {
        return view('searchForm',['dataTask'=> Tasks::where('title','LIKE','%'.$req->input('title').'%')->get()]);
    }
    public function deleteRow($id)
    {
        $task = tasks::find($id);
        $task->executors()->detach();
        $task->delete();
        return response()->json([
            'success' => 'Задача успешно удалена!'
        ]);
    }

    public function updateRow($id,Request $req)
    {
        $task = tasks::findOrFail($id);
        $task->executors()->detach();
        $task->title = $req->input('title');
        $task->status = $req->input('status');
        $task->save();
        $task->executors()->attach($req->input('idExecutor'));
        return redirect()->route('Success');
    }

    public function getRow($id)
    {
        return view('taskEditing',['data'=>Tasks::find($id),'dataEx'=>Executors::all()]);
    }
}
