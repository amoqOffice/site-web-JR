<?php

namespace App\Http\Controllers;

use App\Redaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RedactionController extends Controller
{
    public function index()
    {
        $redactions = Redaction::all();

        return view('back.Redaction.index', compact('redactions'));
    }

    public function create()
    {
        return view('back.Redaction.create');
    }

    public function store(Request $request)
    {
        Redaction::create($request->all());

        Toastr::success('Redaction bien ajouté');

        return redirect()->route('back.redaction.create');
    }

    public function show($id)
    {
        $redaction = Redaction::findOrFail($id);

        return view('back.Redaction.show', compact('redaction'));
    }

    public function edit($id)
    {
        $redaction = Redaction::findOrFail($id);

        return view('back.Redaction.edit', compact('redaction'));
    }

    public function update(Request $request, $id)
    {
        ($request->is_published == 'on') ? $request->is_published = 1 : $request->is_published = 0;

        // dd($request->all());
        $redaction = Redaction::findOrFail($id);
        $redaction->titre = $request->titre;
        $redaction->description = $request->description;
        $redaction->lieu = $request->lieu;
        $redaction->image = $request->image;
        $redaction->type = $request->type;
        $redaction->date_publication = $request->date_publication;
        $redaction->is_published = $request->is_published;
        $redaction->audio_path = $request->audio_path;
        $redaction->save();

        Toastr::success('Redaction bien mis à jour');

        return redirect()->route('back.redaction.index');
    }

    public function destroy()
    {
        $redactionNom = Redaction::findOrFail(request('id'))->nom;
        Redaction::destroy(request('id'));

        return response($redactionNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Redaction::destroy($element);
        }

        return $elements;
    }
}
