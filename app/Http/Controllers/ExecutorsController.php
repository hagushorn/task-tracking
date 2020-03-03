<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Executors;

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
    public function getAllData()
    {
        return view('executor',['data'=>Executors::all()]);
    }
}
