<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Module;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Assignment;
use function Livewire\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{

    public function index(){
        
        $student_level = auth('student')->user()->level;
        $modules = Module::where('level', $student_level)
        ->orderBy('module_name','asc')
        ->get();
        
        return view('student.home',['modules'=>$modules]);
    }

    public function showLoginForm(){
        if(auth('student')->check()){
            return redirect('/student');
        }
        return view('student.login');
    }

    public function showProfile($regno){
        $student = Student::find($regno)->get();
        return view('student.profile',['user'=>$student]);
    }

    public function showPasswordUpdateForm($regno){
        $student = Student::find($regno)->get();
        return view('student.updatePassword',['user'=>$student]);
    }

    public function updatePassword(Request $request,$regno){
        $fields = $request -> validate([
            'newpwd1' => 'required',
            'newpwd1_confirmed' => 'required'
        ]);
        // dd($fields);
        $user = Student::find($regno);
        if($fields['newpwd1'] == $fields['newpwd1_confirmed']){
            $fields = [
                'password' => bcrypt($fields['newpwd1'])

            ];
            $user->update($fields);
            return redirect('/student/profile/'.$regno)->with('status','password changed successfully');
        }
        return back()->with('error',"passwords don't match");
    }

    public function showImageUpdateForm(Request $request,$regno){
        return view('student.updateImage');
    }


    public function updateImage(Request $request, $regno){
        // dd(Storage::disk('public')->get('images/profile/profile-default.png'));
        $fields = $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);
        
        $student = Student::findOrfail($regno);
        $image = time().".".$request->image->extension();
        $request->image->move(public_path('images/profile'), $image);
        
        $fields['image'] = $image;
        $student->update($fields);

        return redirect('/student/profile/'.$regno);
    }


    public function deleteImage(Request $request, $regno)
    {
        // Find the student by their registration number
        $student = Student::findOrFail($regno);
    
        // Check if the image path exists and if the file exists in storage
        if ($student->image) {
            $imagePath = public_path('/images/profile/'. $student->image);
            
            if(File::exists($imagePath)){
                File::delete($imagePath);
                $student->image = null;
                $student->save();
                return redirect('/student/profile/'.$regno);
            }
            dd("could not delete");
        }
    
        // Clear the image attribute in the student model
    }
    



    public function login(Request $request){
        $fields = $request->validate([
            'regno' => 'required',
            'password' => 'required'
        ]);

        if(strlen($fields["regno"]) == 0 || strlen($fields["password"] == 0)){
            return back()->with('error','please fill in data');
        }
        
        if(auth('student')->attempt($fields)){
            return redirect('/student');
        }
        return back()->with('error','invalid login');
    }//end of login

    public function logout(){
        auth('student')->logout();
        return redirect('/student/login');
    }


    public function module($module_code){
        $module = Module::find($module_code);
        $notes = Note::where('module_code',$module_code)->get();
        $assignments = Assignment::where('module_code',$module_code)->get();
        
        return view('student.module',[
            'module' => $module,
            'notes'=>$notes,
            'assignments'=>$assignments
        ]);

    }


    public function showPasswordReset(){
        return view('student.passwordReset');
    }

    public function passwordReset(Request $request){
        $request->validate([
            'email'=>'required|email'
        ],[
            'email.required'=>'please provide an email address',
            'email.email'=>'please provide a valid email'
        ]);



    }

    
}
