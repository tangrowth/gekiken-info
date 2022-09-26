<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CostumeRequest;
use App\Models\Costume;

class CostumeController extends Controller
{
    public function index(){
        $costumes = Costume::all();
        return view('costume', ['costumes'=>$costumes]);
    }

    public function post(CostumeRequest $request){
        $form = $request->all();
        Costume::create($form);
        return redirect ('/costume');
    }

    public function delete($id){
        $costume = Costume::findOrFail($id);
        $costume->delete();
        return redirect('/costume');
    }
}
