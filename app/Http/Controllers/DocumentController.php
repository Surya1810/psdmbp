<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentMovement;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        $users = User::where('role_id', '!=', 1)->get();
        $rfids = Tag::where('status', 'Available')->get();

        return view('document.index', compact('documents', 'rfids', 'users'));
    }
    public function keluar()
    {
        $documents = Document::where('user_id', Auth::user()->id)->get();
        return view('document.keluar', compact('documents'));
    }
    public function masuk()
    {
        $documents = Document::where('user_id', Auth::user()->id)->get();
        $users = User::where('role_id', '!=', 1)->get();

        return view('document.masuk', compact('documents', 'users'));
    }
    public function tersimpan()
    {
        $documents = Document::where('user_id', Auth::user()->id)->get();
        return view('document.tersimpan', compact('documents'));
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
        $document = Document::find($id);

        return view('document.history', compact('history', 'document'));
    }
}
