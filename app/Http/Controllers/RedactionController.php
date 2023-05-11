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

        return redirect()->route('redaction.create');
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
        $redaction = Redaction::findOrFail($id);
        $redaction->update($request->all());

        Toastr::success('Redaction bien mis à jour');

        return redirect()->route('redaction.index');
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
