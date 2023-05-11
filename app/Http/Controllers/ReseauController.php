<?php

namespace App\Http\Controllers;

use App\Reseau;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReseauController extends Controller
{
    public function index()
    {
        $reseaus = Reseau::all();

        return view('back.Reseau.index', compact('reseaus'));
    }

    public function create()
    {
        return view('back.Reseau.create');
    }

    public function store(Request $request)
    {
        Reseau::create($request->all());

        Toastr::success('Reseau bien ajouté');

        return redirect()->route('back.reseau.create');
    }

    public function show($id)
    {
        $reseau = Reseau::findOrFail($id);

        return view('back.Reseau.show', compact('reseau'));
    }

    public function edit($id)
    {
        $reseau = Reseau::findOrFail($id);

        return view('back.Reseau.edit', compact('reseau'));
    }

    public function update(Request $request, $id)
    {
        $reseau = Reseau::findOrFail($id);
        $reseau->update($request->all());

        Toastr::success('Reseau bien mis à jour');

        return redirect()->route('back.reseau.index');
    }

    public function destroy()
    {
        $reseauNom = Reseau::findOrFail(request('id'))->nom;
        Reseau::destroy(request('id'));

        return response($reseauNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Reseau::destroy($element);
        }

        return $elements;
    }
}
