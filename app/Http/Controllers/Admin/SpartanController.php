<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spartan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;

class SpartanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $spartans = Spartan::where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('pv', 'LIKE', '%'.$search.'%')
            ->orWhere('weight', 'LIKE', '%'.$search.'%')
            ->orWhere('height', 'LIKE', '%'.$search.'%')
            ->orWhereHas('types', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->paginate(12);

        return view('admin.spartans.index', [
            'spartans' => $spartans,
        ]);
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.spartans.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pv' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'types' => 'array',
        ]);

        $spartan = Spartan::create($request->only(['name', 'pv', 'weight', 'height']));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $spartan->image = $path;
        }

        $spartan->save();

        // Sync types
        $spartan->types()->sync($request->types);

        return redirect()->route('admin.spartans.index')->with('success', 'Spartan créé avec succès.');
    }

    public function edit($id)
    {
        $spartan = Spartan::findOrFail($id);
        $types = Type::all();
        return view('admin.spartans.edit', compact('spartan', 'types'));
    }

    public function update(Request $request, Spartan $spartan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pv' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'types' => 'array',
        ]);

        $spartan->update($request->only(['name', 'pv', 'weight', 'height']));

        if ($request->hasFile('image')) {
            // Supprimez l'ancienne image si elle existe
            if ($spartan->image && Storage::disk('public')->exists($spartan->image)) {
                Storage::disk('public')->delete($spartan->image);
            }

            // Stockez la nouvelle image
            $path = $request->file('image')->store('images', 'public');
            $spartan->image = $path;
        }

        $spartan->save();

        // Sync types
        $spartan->types()->sync($request->types);

        return redirect()->route('admin.spartans.index')->with('success', 'Spartan mis à jour avec succès.');
    }

    public function destroy(Spartan $spartan)
    {
        if ($spartan->image) {
            Storage::disk('public')->delete($spartan->image);
        }
        $spartan->delete();

        return redirect()->route('admin.spartans.index')->with('success', 'Spartan supprimé avec succès.');
    }
}

