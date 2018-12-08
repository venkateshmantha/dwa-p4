<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tudu;

class TuduController extends Controller
{
    private $tudus;
    private $priorities;
    private $hightudus;
    private $mediumtudus;
    private $lowtudus;

    public function __construct()
    {
        $this->tudus = Tudu::all();
        $this->priorities = ['High', 'Medium', 'Low'];
        $this->hightudus = $this->tudus->where('priority', 'High');
        $this->mediumtudus = $this->tudus->where('priority', 'Medium');
        $this->lowtudus = $this->tudus->where('priority', 'Low');
    }

    public function index(Request $request)
    {
        return view('tudu')->with([
            'priorities' => $this->priorities,
            'hightudus' => $this->hightudus,
            'mediumtudus' => $this->mediumtudus,
            'lowtudus' => $this->lowtudus
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'description' => 'required|max:140'
        ]);
        $tudu = new Tudu();
        $tudu->description = $request->input('description');
        $tudu->priority = $request->input('priority');
        $tudu->isdone = false;
        $tudu->save();

        return redirect('/')->with([
            'alert' => 'Your tudu is added.'
        ]);
    }

    public function update(Request $request, $id)
    {
        $tudu = Tudu::find($id);
        $action = $request->input('button');

        if ($action=='done') {
            $tudu->isdone = true;
            $tudu->save();
            return redirect('/');
        }
        else if ($action=='edit') {
            return view('edit')->with([
                'tudu' => $tudu,
                'priorities' => $this->priorities,
                'hightudus' => $this->hightudus,
                'mediumtudus' => $this->mediumtudus,
                'lowtudus' => $this->lowtudus
            ]);
        }
        else if ($action=='delete') {
            return view('delete')->with([
                'tudu' => $tudu,
                'priorities' => $this->priorities,
                'hightudus' => $this->hightudus,
                'mediumtudus' => $this->mediumtudus,
                'lowtudus' => $this->lowtudus
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        $tudu = Tudu::find($id);
        $tudu->description = $request->input('description');
        $tudu->priority = $request->input('priority');
        $tudu->save();

        return redirect('/')->with([
            'alert' => 'Your tudu is updated.'
        ]);

    }

    public function delete(Request $request, $id)
    {
        $tudu = Tudu::find($id);
        $tudu->delete();

        return redirect('/')->with([
            'alert' => 'Your tudu is deleted.'
        ]);
    }
}
