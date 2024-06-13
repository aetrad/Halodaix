<?php

namespace App\Http\Controllers;

use App\Models\Spartan;

class HomepageController extends Controller
{
    public function index()
    {
        $spartans = Spartan::paginate(12);

        return view('homepage.index', [
            'spartans' => $spartans,
        ]);
    }
}

