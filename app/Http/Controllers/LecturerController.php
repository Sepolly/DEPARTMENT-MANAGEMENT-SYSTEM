<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Module;
use App\Models\Note;
use App\Models\Student;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function dashboard()
    {
        $lecturer_id = auth('lecturer')->user()->id;
        $modules = Module::where('lecturer_id', $lecturer_id)->get();
        return view('lecturer.dashboard', ['modules' => $modules]);
    }

    public function module($module_code)
    {
        $moduledata = Module::find($module_code);
        $students = Student::where('level', $moduledata->level)->paginate(10);
        $notes = Note::where('module_code', $moduledata->module_code)->get();
        $assignments = $moduledata->assignments;

        return view('lecturer.module', [
            'module' => $moduledata, 
            'students' => $students,
            'notes'=>$notes,
            'assignments'=>$assignments
        ]);
    }

    public function noteUpload(Request $request, $module_code)
    {
        $module = Module::where('module_code', $module_code)->firstOrFail();

        $request->validate([
            'title' => 'required|min:3',
            'file' => 'required|file',
        ], [
            'title.required' => 'Please provide a title for the note',
            'file.required' => 'Please upload the file',
        ]);

        $title = $request->title;
        $file = $title . "." . $request->file->extension();

        $note = new Note;
        $note->file = $file;
        $note->title = $title;
        $note->level = $module->level;
        $note->module_code = $module->module_code;
        $note->save();
        $request->file->move(public_path('files/notes'), $file);

        return back()->with("message", "Note added successfully");
    }

    // Function to upload assignment
    public function assignmentUpload(Request $request, $module_code){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'due_date'=>'required',
            'due_time'=>'required',
            'content'=>'nullable',
            'file'=>'required|file',
        ]);
        $file = $request->title . "." . $request->file->extension();

        $assignment = new Assignment;
        $assignment->assignment_title = $request->title;
        $assignment->assignment_description = $request->description;
        $assignment->assignment_due_date = $request->due_date;
        $assignment->assignment_due_time = $request->due_time;
        $assignment->assignment_content = $request->content;
        $assignment->module_code = $module_code;
        $assignment->assignment_file = $file;
        $assignment->signed_by = auth('lecturer')->user()->id;
        $assignment->save();

        $request->file->move(public_path('files/assignments'), $file);

        return back()->with('message','assignment added');
    }

    public function updateModule(Request $request,$module_code){
        $module = Module::findOrFail($module_code);
        $request->validate(['description'=>'required']);

        $module->description = strip_tags($request->description);
        $module->save();

        return back()->with('message','description updated');


    }



    public function showLoginForm()
    {
        return view('lecturer.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);

        if (auth('lecturer')->attempt($credentials)) {
            return redirect('/lecturer');
        }
    }

    public function logout()
    {
        auth('lecturer')->logout();
        return redirect('/lecturer/login');
    }
}
