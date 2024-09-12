<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Display list of subjects
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }

    // Show the form for creating a new subject
    public function create()
    {
        return view('admin.subjects.create');
    }

    // Store a newly created subject
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Subject::create(['name' => $request->name]);

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully');
    }

    // Show the form for editing the specified subject
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('subject'));
    }

    // Update the specified subject
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update(['name' => $request->name]);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');
    }

    // Remove the specified subject from storage
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
    }
}
