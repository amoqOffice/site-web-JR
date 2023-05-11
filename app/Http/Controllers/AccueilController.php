<?php

namespace App\Http\Controllers;

use App\Accueil;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $accueils = Accueil::all();

        return view('back.Accueil.index', compact('accueils'));
    }

    public function create()
    {
        return view('back.Accueil.create');
    }

    public function store(Request $request)
    {
        Accueil::create($request->all());

        Toastr::success('Accueil bien ajouté');

        return redirect()->route('accueil.create');
    }

    public function show($id)
    {
        $accueil = Accueil::findOrFail($id);

        return view('back.Accueil.show', compact('accueil'));
    }

    public function edit($id)
    {
        $accueil = Accueil::findOrFail($id);

        return view('back.Accueil.edit', compact('accueil'));
    }

    public function update(Request $request, $id)
    {
        $accueil = Accueil::findOrFail($id);
        $accueil->update($request->all());

        Toastr::success('Accueil bien mis à jour');

        return redirect()->route('accueil.index');
    }

    public function destroy()
    {
        $accueilNom = Accueil::findOrFail(request('id'))->nom;
        Accueil::destroy(request('id'));

        return response($accueilNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Accueil::destroy($element);
        }

        return $elements;
    }
}
