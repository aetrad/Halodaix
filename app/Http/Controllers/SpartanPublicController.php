<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Spartan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SpartanPublicController extends Controller
{
    use AuthorizesRequests; // Ajoutez cette ligne pour utiliser authorize

    public function index(Request $request)
    {
        $spartans = Spartan::withCount('comments')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('spartans.index', [
            'spartans' => $spartans,
        ]);
    }

    public function show($id)
    {
        $spartan = Spartan::findOrFail($id);
        $comments = $spartan->comments()->with('user')->orderBy('created_at')->get();

        return view('spartans.show', [
            'spartan' => $spartan,
            'comments' => $comments,
        ]);
    }

    public function addComment(Request $request, Spartan $spartan)
    {
        $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        $comment = $spartan->comments()->make();
        $comment->body = $request->input('body');
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return redirect()->back();
    }

    public function deleteComment(Spartan $spartan, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back();
    }
}
