<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PetController extends Controller
{
    public function index()
    {
        $records = Pet::all();
        return view('records.index', compact('records'));
    }

   
public function create()
{
    if (!Gate::allows('create records')) {
        abort(403, 'Unauthorized action.');
    }
    return view('records.create');
}

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'species' => 'required|string|max:255',
        'age' => 'required|integer|min:0',
        'owner_name' => 'required|string|max:255',
        'medical_history' => 'nullable|string',
    ]);

    Pet::create($request->all());

    return redirect()->route('records.index')->with('success', 'Pet added successfully!');
}


public function edit($id)
{
    if (!Gate::allows('edit records')) {
        abort(403, 'Unauthorized action.');
    }
    $pet = Pet::findOrFail($id);
    return view('records.edit', compact('pet'));
}

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer',
            'owner_name' => 'required',
            'medical_history' => 'nullable',
        ]);

        $pet->update($request->all());
        return redirect()->route('records.index');
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete records')) {
            abort(403, 'Unauthorized action.');
        }
        Pet::findOrFail($id)->delete();
        return redirect()->route('records.index')->with('success', 'Pet deleted successfully.');
    }
}
