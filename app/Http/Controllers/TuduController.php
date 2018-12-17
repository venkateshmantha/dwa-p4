<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tudu;
use App\Tag;

class TuduController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $tudus = $user->tudus()->get();
        $tudusCount = count($tudus);
        $tags = Tag::getForCheckboxes();

        session(['priorities' => ['High', 'Medium', 'Low']]);
        session(['hightudus' => $tudus->where('priority', 'High')]);
        session(['mediumtudus' => $tudus->where('priority', 'Medium')]);
        session(['lowtudus' => $tudus->where('priority', 'Low')]);

        return view('tudu')->with([
            'tags' => $tags,
            'tudusCount' => $tudusCount,
            'priorities' => session('priorities'),
            'hightudus' => session('hightudus'),
            'mediumtudus' => session('mediumtudus'),
            'lowtudus' => session('lowtudus')
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'description' => 'required|max:140',
            'tags' => 'required'
        ]);

        $tudu = new Tudu();
        $tudu->description = $request->input('description');
        $tudu->priority = $request->input('priority');
        $tudu->isdone = false;
        $tudu->user_id = $request->user()->id;
        $tudu->save();

        $tudu->tags()->sync($request->tags);

        return redirect('/')->with([
            'alert' => 'Your tudu is added.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $tudu = Tudu::find($id);
        $tags = Tag::getForCheckboxes();
        $checkedTags = [];
        $tagsForThisTudu = $tudu->tags;
        $tudusCount=1;

        foreach($tagsForThisTudu as $tagForThisTudu) {
            array_push($checkedTags, $tagForThisTudu['id']);
        }

        $action = $request->input('button');

        if ($action == 'done') {
            $tudu->isdone = true;
            $tudu->save();
            return redirect('/')->with([
                'alert' => 'Your tudu is marked done.'
            ]);
        }
        else if ($action == 'edit') {
            return view('edit')->with([
                'tudu' => $tudu,
                'tags' => $tags,
                'tudusCount' => $tudusCount,
                'checkedTags' => $checkedTags,
                'priorities' => session('priorities'),
                'hightudus' => session('hightudus'),
                'mediumtudus' => session('mediumtudus'),
                'lowtudus' => session('lowtudus')
            ]);
        }
        else if ($action == 'delete') {
            return view('delete')->with([
                'tudu' => $tudu,
                'tags' => $tags,
                'tudusCount' => $tudusCount,
                'checkedTags' => $checkedTags,
                'priorities' => session('priorities'),
                'hightudus' => session('hightudus'),
                'mediumtudus' => session('mediumtudus'),
                'lowtudus' => session('lowtudus')
            ]);
        }
    }

    public function showupdate(Request $request, $id)
    {
        $tudu = Tudu::find($id);
        $tags = Tag::getForCheckboxes();
        $checkedTags = $request->input('tags');
        return view('edit')->with([
            'tudu' => $tudu,
            'tags' => $tags,
            'checkedTags' => $checkedTags,
            'priorities' => session('priorities'),
            'hightudus' => session('hightudus'),
            'mediumtudus' => session('mediumtudus'),
            'lowtudus' => session('lowtudus')
        ]);
    }

    public function edit(Request $request, $id)
    {
        if ($request->has('cancel')) {
            return redirect('/');
        }

        $this->validate($request, [
            'description' => 'required|max:140',
            'tags' => 'required'
        ]);

        $tudu = Tudu::find($id);
        $tudu->tags()->sync($request->tags);
        $tudu->description = $request->input('description');
        $tudu->priority = $request->input('priority');
        $tudu->save();

        return redirect('/')->with([
            'alert' => 'Your tudu is updated.'
        ]);
    }

    public function delete(Request $request, $id)
    {
        if ($request->has('cancel')) {
            return redirect('/');
        }

        $tudu = Tudu::find($id);
        $tudu->tags()->detach();
        $tudu->delete();

        return redirect('/')->with([
            'alert' => 'Your tudu is deleted.'
        ]);
    }
}
