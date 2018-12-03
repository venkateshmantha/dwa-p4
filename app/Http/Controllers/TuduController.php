<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tudu;

class TuduController extends Controller
{
    public function index(Request $request)
    {
        $tudus = Tudu::all();
        $hightudus = $tudus->where('priority', 'High');
        $mediumtudus = $tudus->where('priority', 'Medium');
        $lowtudus = $tudus->where('priority', 'Low');

        return view('tudu')->with([
            'priorities' => ['High', 'Medium', 'Low'],
            'hightudus' => $hightudus,
            'mediumtudus' => $mediumtudus,
            'lowtudus' => $lowtudus
        ]);
    }

    public function create(Request $request)
    {
        $tudu = new Tudu();
        $tudu->description = $request->input('description');
        $tudu->priority = $request->input('priority');
        $tudu->isdone = false;
        $tudu->save();

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $tudu = Tudu::find($id);
        $action = $request->input('button');
        if ($action=='done') {
            $tudu->isdone = true;
            $tudu->save();
        }
        else if ($action=='edit') {

        }
        else if ($action=='delete') {
            $tudu->delete();
        }


        return redirect('/');
    }
}
