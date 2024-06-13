<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderByDesc('updated_at')->paginate(10);
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        $type = new Type($request->only(['name', 'color']));

        if ($request->hasFile('image')) {
            $type->image = $request->file('image')->store('images', 'public');
        }

        $type->save();

        return redirect()->route('types.index')->with('success', 'Type ajouté avec succès.');
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        $type = Type::findOrFail($id);
        $type->fill($request->only(['name', 'color']));

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($type->image) {
                Storage::disk('public')->delete($type->image);
            }
            $type->image = $request->file('image')->store('images', 'public');
        }

        $type->save();

        return redirect()->route('types.index')->with('success', 'Type modifié avec succès.');
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        if ($type->image) {
            Storage::disk('public')->delete($type->image);
        }
        $type->delete();
        return redirect()->route('types.index')->with('success', 'Type supprimé avec succès.');
    }
}
