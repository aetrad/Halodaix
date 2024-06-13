<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spartan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpartanController extends Controller
{
    public function index()
    {
        $spartans = Spartan::orderByDesc('updated_at')->paginate(10);
        return view('admin.spartans.index', compact('spartans'));
    }

    public function create()
    {
        return view('admin.spartans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pv' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $spartan = new Spartan($request->only(['name', 'pv', 'weight', 'height']));

        if ($request->hasFile('image')) {
            $spartan->image = $request->file('image')->store('images', 'public');
        }

        $spartan->save();

        return redirect()->route('spartans.index')->with('success', 'Spartan ajouté avec succès.');
    }

    public function edit($id)
    {
        $spartan = Spartan::findOrFail($id);
        return view('admin.spartans.edit', compact('spartan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pv' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $spartan = Spartan::findOrFail($id);
        $spartan->fill($request->only(['name', 'pv', 'weight', 'height']));

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($spartan->image) {
                Storage::disk('public')->delete($spartan->image);
            }
            $spartan->image = $request->file('image')->store('images', 'public');
        }

        $spartan->save();

        return redirect()->route('spartans.index')->with('success', 'Spartan modifié avec succès.');
    }

    public function destroy($id)
    {
        $spartan = Spartan::findOrFail($id);
        if ($spartan->image) {
            Storage::disk('public')->delete($spartan->image);
        }
        $spartan->delete();
        return redirect()->route('spartans.index')->with('success', 'Spartan supprimé avec succès.');
    }
}
