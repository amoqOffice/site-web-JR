<?php

namespace App\Http\Controllers;

use App\Emission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EmissionController extends Controller
{
    public function index()
    {
        $emissions = Emission::all();

        return view('back.Emission.index', compact('emissions'));
    }

    public function create()
    {
        return view('back.Emission.create');
    }

    public function store(Request $request)
    {
        Emission::create($request->all());

        Toastr::success('Emission bien ajouté');

        return redirect()->route('back.emission.create');
    }

    public function show($id)
    {
        $emission = Emission::findOrFail($id);

        return view('back.Emission.show', compact('emission'));
    }

    public function edit($id)
    {
        $emission = Emission::findOrFail($id);

        return view('back.Emission.edit', compact('emission'));
    }

    public function update(Request $request, $id)
    {
        $emission = Emission::findOrFail($id);
        $emission->update($request->all());

        Toastr::success('Emission bien mis à jour');

        return redirect()->route('back.emission.index');
    }

    public function destroy()
    {
        $emissionNom = Emission::findOrFail(request('id'))->nom;
        Emission::destroy(request('id'));

        return response($emissionNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Emission::destroy($element);
        }

        return $elements;
    }
}
