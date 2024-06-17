<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spartan;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $spartans = Spartan::with(['types', 'comments'])
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('pv', 'LIKE', '%'.$search.'%')
                    ->orWhere('weight', 'LIKE', '%'.$search.'%')
                    ->orWhere('height', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('types', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%'.$search.'%');
                    });
            })
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('homepage.index', [
            'spartans' => $spartans,
        ]);
    }
}
