<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Models\Students;
class StudentsController extends Controller
{
    public function index(){
        $students = Students::latest()->paginate(5);
        $msg = "hello world";
        //var_dump($students);
        return view("students", ["list"=>$students, "count"=>6, "message"=> $msg ]);
    }

    public function addnew(){
        return view('students.addnew');
    }

    public function storestudent(Request $request){
        //dd($request->name);
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:students',
            'department' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        error_log('File size: '.$request->image->getSize());
        $imageName = time().'.'.$request->image->extension();
        // Public Folder
        $request->image->move(public_path('images'), $imageName);
        $student = new Students;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->department = $request->department;
        $student->image = $imageName;
        $student->save();
        return redirect('/');
    }

    public function editstudent($id){
        $student = Students::where('id', $id)->first();
        $msg = "hello world";
        $count = 123;
        return view('students.updatestudent', ['student'=>$student]);
    }

    

    public function removestudent($id){
        $student = Students::where('id', $id)->first();
        $student->delete();
        return redirect('/');
    }


    

    public function updatesubmit(Request $request, $id){
        //dd($request->name);
        $student = Students::where('id', $id)->first();
        $fileName = $student->image;
       
        if ($request->hasFile('image')) {
            $validated = $request->validate([
                'name' => 'required|min:3',
                'email' =>  [
                    'required',
                    Rule::unique('students', 'email')->ignore($id),
                  ],
                'department' => 'required',
                'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $fileName = time() . '.' . $request->image->extension();
            error_log('File name: '.$fileName );
         
            $request->image->move(public_path('images'), $fileName);
        }else{
            $validated = $request->validate([
                'name' => 'required|min:3',
                'email' =>  [
                    'required',
                    Rule::unique('students', 'email')->ignore($id),
                  ],
                'department' => 'required'
            ]);
            error_log('File name2222: '.$fileName );
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->department = $request->department;
        $student->image = $fileName; 
        $student->save();
        return redirect('/');
    }
}
