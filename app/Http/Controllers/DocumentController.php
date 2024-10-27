<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentMovement;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();

        return view('document.index', compact('documents'));
    }
    public function my_document()
    {
        $documents = Document::where('created_by', auth()->user->id)->get();
        return view('document.my', compact('documents'));
    }
    public function waiting_review()
    {
        $documents = Document::where('created_by', auth()->user->id)->get();
        return view('document.waiting', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }

    public function moveDocument(Request $request, $documentId)
    {
        $request->validate([
            'from_building_id' => 'required|exists:buildings,id',
            'to_building_id' => 'required|exists:buildings,id',
        ]);

        $document = Document::findOrFail($documentId);

        // Record the movement
        DocumentMovement::create([
            'document_id' => $document->id,
            'from_building_id' => $request->from_building_id,
            'to_building_id' => $request->to_building_id,
            'moved_at' => now(),
        ]);

        return response()->json(['message' => 'Document moved successfully.']);
    }

    public function history($id)
    {
        $history = Document::with('movements.fromBuilding', 'movements.toBuilding')
            ->findOrFail($id);

        return view('document.history', compact('history'));
    }
}