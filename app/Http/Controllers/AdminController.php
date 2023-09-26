<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Module;
use App\Models\Lecturer;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard(){
        $students = Student::all();
        $lecturers = Lecturer::all();
        $modules = Module::all();
        return view('admin.admin',['students'=>$students,'lecturers'=>$lecturers,'modules'=>$modules]);
    }
   

    public function addStudent(Request $request){
        $fields = $request->validate([
            'regno' => ['required',Rule::unique('students','regno')],
            'first_name'=>'required',
            'last_name'=>'required',
            'other_name'=>'nullable',
            'usertype'=>'required',
            'level'=>'required',
            'status'=>'nullable',
            'phone'=>'required',
            'is_repeating'=>'required',
            'address'=>'nullable',
            'date_of_birth'=>'nullable',
            'email'=>'required',
            'password'=>'required'
            
        ]);
        // dd($fields);

        // the strip tags are used to get rid of any html tags
        $fields['regno'] = strip_tags($fields['regno']);
        $fields['email'] = strip_tags($fields['email']);
        if($fields['other_name']){
            $fields['other_name'] = ucfirst(strip_tags($fields['other_name']));
        }

        // ucfirst is used to convert the first character to capital
        $fields['first_name'] = ucfirst(strip_tags($fields['first_name']));
        $fields['last_name'] = ucfirst(strip_tags($fields['last_name']));

        // intval is used to convert the string to integer
        $fields['level'] = intval($fields['level']);
        $fields['status'] = intval($fields['status']);

        // convert the string input to boolean
        $fields['is_repeating'] = filter_var($fields['is_repeating'], FILTER_VALIDATE_BOOLEAN);

        // password hashing
        $fields['password'] = bcrypt($fields['password']);

        // insert values into the database
        Student::create($fields);
        return back()->with('status','student successfully added');
    }//end addStudent

    public function addLecturer(Request $request){
        $fields = $request->validate([
            'id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'usertype'=>'required',
            'title'=>'nullable',
            'email'=>'required',
            'address'=>'nullable',
            'password'=>'required'
        ]);

        $fields['password'] = bcrypt($fields['password']);

       try {
        Lecturer::create($fields);
        return back()->with('status','lecturer successfully added');
       } catch (\Throwable $th) {
        throw $th;
       }

    }

    public function addModule(Request $request){
        $fields = $request->validate([
            'module_code' => 'required',
            'module_name'=>'required',
            'lecturer_id' => 'required',
            'level'=>'required'
        ]);
        
        $fields['level'] = intval($fields['level']);
        Module::create($fields);
        return back()->with('status','module successfully added');
    }

    public function showLogin(){
        return view('admin.login');
    }

   public function login(Request $request){
       $fields = $request->validate([
           'username'=>'required',
           'password'=>'required'
        ]);
        // dd(auth('admin')->attempt($fields));
        if(auth('admin')->attempt($fields)){
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error','invalid login');
   }

   public function showMakeAdmin(){
    $lecturers = Lecturer::all();
    return view('admin.makeAdmin',['lecturers' => $lecturers]);
   }


   public function makeAdmin(Request $request){
    $fields = $request->validate(['lecturer_id'=>'required']);
    $lecturer = Lecturer::findOrfail($fields['lecturer_id']);
    if($lecturer["is_admin"]){
        return back()->with('success',$lecturer['title'] . " " . $lecturer['first_name'] . " " . 'is already an admin');
    }
    $fields["is_admin"] = true;
    $lecturer->update($fields);
    $admin = [
        'id'=>$fields['lecturer_id'],
        'username'=>'admin',
        'email'=>$lecturer['email'],
        'password'=>bcrypt('password')
    ];
    Admin::create($admin);
    return back()->with('success',$lecturer['title'] . " " . $lecturer['first_name'] . " " . 'is now an admin');
   }
}
