<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Models\Students;
class StudentsController extends Controller
{
    public function index(){
        $students = Students::all();
        //var_dump($students);
        return view("students", ["list"=>$students]);
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
        ]);
        $student = new Students;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->department = $request->department;
        $student->save();
        return redirect('/');
    }

    public function editstudent($id){
        $student = Students::where('id', $id)->first();
        return view('students.updatestudent', ['student'=>$student]);
    }

    

    public function updatesubmit(Request $request, $id){
        //dd($request->name);
        $student = Students::where('id', $id)->first();
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' =>  [
                'required',
                Rule::unique('students', 'email')->ignore($id),
              ],
            'department' => 'required',
        ]);
       
        $student->name = $request->name;
        $student->email = $request->email;
        $student->department = $request->department;
        $student->save();
        return redirect('/');
    }
}
