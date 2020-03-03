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
    public function updateRow($id,Request $req)
    {
        $executors = Executors::find($id);
        $executors->name = $req->input('name');
        $executors->post = $req->input('post');
        $executors->save();
        return redirect()->route('executor');
    }
}
