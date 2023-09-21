<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Module;
use App\Models\Lecturer;
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
            'firstname'=>'required',
            'lastname'=>'required',
            'othername'=>'nullable',
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
        if($fields['othername']){
            $fields['othername'] = ucfirst(strip_tags($fields['othername']));
        }

        // ucfirst is used to convert the first character to capital
        $fields['firstname'] = ucfirst(strip_tags($fields['firstname']));
        $fields['lastname'] = ucfirst(strip_tags($fields['lastname']));

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
            'firstname'=>'required',
            'lastname'=>'required',
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
            'modulecode' => 'required',
            'modulename'=>'required',
            // 'lecturer_id' => 'required',
            'phone'=>'required',
            'level'=>'required'
        ]);
        dd($fields);
        $lecturer_phone = $fields['lecturer_id'];
        $lect_id = Lecturer::where('phone',$lecturer_phone)
                            ->first()
                            ->id;
        $lect_name = Lecturer::where('phone',$lecturer_phone)
                            ->first()
                            ->firstname;
        $fields['lecturer_id'] = $lect_id;
        Module::create($fields);
        return back()->with('status','module assigned to '.$lect_name);
    }

    public function show($role){
        if($role == 'student'){
            $data = Student::all();
            return view('admin.show',['data' => $data,'role' => $role]);
        }
        elseif($role == 'lecturer'){
            $data = Lecturer::all();
            return view('admin.show',['data' => $data,'role' => $role]);
        }
        else{
            $data = Module::all();
            return view('admin.show',['data' => $data,'role' => $role]);
        }

    }
}
