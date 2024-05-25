<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Venue;

class CommentController extends Controller
{
    public function store(Request $request, $venueId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->venue_id = $venueId;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('update', $comment); // Ensure the user is authorized to edit the comment

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('update', $comment);

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('venue.show', ['venue' => $request->input('venue_id')])->with('message', 'Comment updated successfully.');
    }
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $venue_id = $comment->venue_id;
        $comment->delete();

        return redirect()->route('venue.show', ['venue' => $venue_id])->with('message', 'Comment deleted successfully.');
    }

}
