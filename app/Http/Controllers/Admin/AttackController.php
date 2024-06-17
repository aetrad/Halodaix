<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attack;
use App\Models\Spartan;
use App\Models\Type;
use Illuminate\Http\Request;

class AttackController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $attacks = Attack::where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%')
            ->orWhereHas('type', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->paginate(12);

        return view('admin.attacks.index', [
            'attacks' => $attacks,
        ]);
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
            'description' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
        ]);

        Attack::create($request->all());

        return redirect()->route('admin.attacks.index')->with('success', 'Attack created successfully.');
    }

    public function edit(Attack $attack)
    {
        $types = Type::all();
        return view('admin.attacks.edit', compact('attack', 'types'));
    }

    public function update(Request $request, Attack $attack)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'damage' => 'required|integer',
            'description' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
        ]);

        $attack->update($request->all());

        return redirect()->route('admin.attacks.index')->with('success', 'Attack updated successfully.');
    }

    public function destroy(Attack $attack)
    {
        $attack->delete();

        return redirect()->route('admin.attacks.index')->with('success', 'Attack deleted successfully.');
    }
}


