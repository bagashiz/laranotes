<?php

namespace App\Http\Controllers;

use App\Models\Note;

class NoteController extends Controller
{
    // index show all authenticated user notes
    public function index()
    {
        return view(
            'notes.index',
            [
                'notes' => Note::where('user_id', auth()->id())->latest()->filter(request(['tag', 'search']))->paginate(6)
            ]
        );
    }

    // show redirects to a page to show single note
    public function show(Note $note)
    {
        return view(
            'notes.show',
            [
                'note' => $note
            ]
        );
    }

    // create shows a form to create a new note
    public function create()
    {
        return view('notes.create');
    }

    // store save a new note to the database
    public function store()
    {
        $formFields = request()->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Note::create($formFields);

        return redirect('/')->with('success', 'Note created successfully!');
    }

    // edit shows a form to edit an existing note
    public function edit(Note $note)
    {
        return view(
            'notes.edit',
            [
                'note' => $note
            ]
        );
    }

    // update save the updated note to the database
    public function update(Note $note)
    {
        // check if current user is the owner of the note
        if ($note->user_id !== auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = request()->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        $note->update($formFields);

        return redirect('/')->with('success', 'Note updated successfully!');
    }

    // destroy delete the note from the database
    public function destroy(Note $note)
    {
        // check if current user is the owner of the note
        if ($note->user_id !== auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $note->delete();

        return redirect('/')->with('success', 'Note deleted successfully!');
    }

    // manage show page to manage notes
    public function manage()
    {
        return view(
            'notes.manage',
            [
                'notes' => Note::where('user_id', auth()->id())->latest()->paginate(6)
            ]
        );
    }
}
