<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 

class StudentController extends Controller
{
    public function index()
    {
        // Get all students from the database
        $students = Student::all();

        // Pass data to the index view
        return view('student', compact('students'));
    }



    // Show create form
    public function create()
    {
        return view('create');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'age'  => 'required|integer|min:1',
        ]);

        // Store new student
        Student::create([
            'name' => $request->name,
            'age'  => $request->age,
        ]);

        // Redirect back to student list with success message
        return redirect()->route('students')->with('success', 'Student added successfully!');
    }

    // Show Edit Form
public function edit($id)
{
    $student = Student::findOrFail($id);
    // dd($student);
    return view('edit', compact('student'));
}

// Update Student
public function update(Request $request, $id)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'age'  => 'required|integer|min:1',
    ]);

    $student = Student::findOrFail($id);
    $student->update([
        'name' => $request->name,
        'age'  => $request->age,
    ]);

    return redirect()->route('students')->with('success', 'Student updated successfully!');
}

// Delete Student
public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students')->with('success', 'Student deleted successfully!');
}

}
