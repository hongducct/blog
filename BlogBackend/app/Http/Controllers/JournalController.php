<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    // Lấy danh sách tất cả journals
    public function index()
    {
        $journals = Journal::all();
        return response()->json($journals);
    }

    // Lưu journal mới
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
            'content' => 'required|string',
            'emotion' => 'required|string',
        ]);

        $journal = Journal::create($validatedData);

        return response()->json([
            'message' => 'Journal created successfully',
            'data' => $journal
        ], 201);
    }

    // Lấy một journal theo id
    public function show($id)
    {
        $journal = Journal::findOrFail($id);
        return response()->json($journal);
    }
}
