<?php

namespace App\Http\Controllers;

use App\Models\Spartan;
use Illuminate\Http\Request;

class SpartanController extends Controller
{
    public function homepage() {
        $spartans = Spartan::all();
        return view('homepage', compact('spartans'));
    }
    public function index()
    {
        $spartans = Spartan::paginate(12);

        return view('spartans.index', [
            'spartans' => $spartans,
        ]);
    }

    public function create() {
        return view('spartans.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pv' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        Spartan::create($validatedData);

        return redirect()->route('spartans.index');
    }

    public function show($id)
    {
        $spartan = Spartan::findOrFail($id);

        return view('spartans.show', [
            'spartan' => $spartan,
        ]);
    }

    public function edit(Spartan $spartan) {
        return view('spartans.edit', compact('spartan'));
    }

    public function update(Request $request, Spartan $spartan) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pv' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        $spartan->update($validatedData);

        return redirect()->route('spartans.index');
    }

    public function destroy(Spartan $spartan) {
        $spartan->delete();

        return redirect()->route('spartans.index');
    }
}

