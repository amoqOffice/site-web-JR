<?php

namespace App\Http\Controllers;

use App\Enseignement;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EnseignementController extends Controller
{
    public function index()
    {
        $enseignements = Enseignement::all();

        return view('back.Enseignement.index', compact('enseignements'));
    }

    public function create()
    {
        return view('back.Enseignement.create');
    }

    public function store(Request $request)
    {
        Enseignement::create($request->all());

        Toastr::success('Enseignement bien ajouté');

        return redirect()->route('enseignement.create');
    }

    public function show($id)
    {
        $enseignement = Enseignement::findOrFail($id);

        return view('back.Enseignement.show', compact('enseignement'));
    }

    public function edit($id)
    {
        $enseignement = Enseignement::findOrFail($id);

        return view('back.Enseignement.edit', compact('enseignement'));
    }

    public function update(Request $request, $id)
    {
        $enseignement = Enseignement::findOrFail($id);
        $enseignement->update($request->all());

        Toastr::success('Enseignement bien mis à jour');

        return redirect()->route('enseignement.index');
    }

    public function destroy()
    {
        $enseignementNom = Enseignement::findOrFail(request('id'))->nom;
        Enseignement::destroy(request('id'));

        return response($enseignementNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Enseignement::destroy($element);
        }

        return $elements;
    }
}
