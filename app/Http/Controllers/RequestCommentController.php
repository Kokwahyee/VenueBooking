<?php

namespace App\Http\Controllers;

use App\Models\RequestComment;
use Illuminate\Http\Request;

class RequestCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'request_change_id' => 'required|exists:request_changes,id',
            'comment' => 'required|string',
        ]);

        RequestComment::create([
            'user_id' => auth()->id(),
            'request_change_id' => $request->request_change_id,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
