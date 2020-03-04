<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Executors;
use App\Tasks;
class ExecutorsController extends Controller
{
    public function submit(Request $req)
    {
        $executors = new Executors();
        $executors->name = $req->input('name');
        $executors->post = $req->input('post');
        $executors->save();
        return redirect()->route('successefulAdd');
    }
    public function getDataForMain()
    {
        return view('main',['data'=>Executors::all(),'dataTask'=>Tasks::all()]);
    }
    public function getAllData()
    {
        return view('executor',['data'=>Executors::all()]);
    }
    public function getRow($id)
    {
        return view('executorEditing',['data'=>Executors::find($id)]);
    }
    public function deleteRow($id)
    {
        $check=false;
        foreach(Tasks::all() as $val)
        {
            if(count($val->executors()->pluck('name'))==1)
                if(Executors::find($id)->name===$val->executors()->pluck('name')->implode(', '))
                {
                    $check = true;
                    break;
                }
        }
        if(!$check)
        {
            Executors::find($id)->tasks()->detach();
            Executors::find($id)->delete();
        }
        return response()->json([
            'success' => !$check
        ]);
    }
    public function updateRow($id,Request $req)
    {
        $executors = Executors::find($id);
        $executors->name = $req->input('name');
        $executors->post = $req->input('post');
        $executors->save();
        return redirect()->route('executor');
    }
}
