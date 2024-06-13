<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attack;
use App\Models\Type;
use Illuminate\Http\Request;

class AttackController extends Controller
{
    public function index()
    {
        $attacks = Attack::orderByDesc('updated_at')->paginate(10);
        return view('admin.attacks.index', compact('attacks'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.attacks.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'damage' => 'required|integer',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
        ]);

        $attack = new Attack($request->only(['name', 'damage', 'description', 'type_id']));
        $attack->save();

        return redirect()->route('attacks.index')->with('success', 'Attaque ajoutée avec succès.');
    }

    public function edit($id)
    {
        $attack = Attack::findOrFail($id);
        $types = Type::all();
        return view('admin.attacks.edit', compact('attack', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'damage' => 'required|integer',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
        ]);

        $attack = Attack::findOrFail($id);
        $attack->fill($request->only(['name', 'damage', 'description', 'type_id']));
        $attack->save();

        return redirect()->route('attacks.index')->with('success', 'Attaque modifiée avec succès.');
    }

    public function destroy($id)
    {
        $attack = Attack::findOrFail($id);
        $attack->delete();
        return redirect()->route('attacks.index')->with('success', 'Attaque supprimée avec succès.');
    }
}
