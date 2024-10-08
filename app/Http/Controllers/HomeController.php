<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $all_student = Student::paginate(5); //all();
        return view('home',compact('all_student'));
    }

    public function about(){
        return view('about');
    }

    public function addstudent(){
        return view('addStudent');
    }

    public function insertstudent(Request $req){
        $req->validate([
            'idstudent' => 'required|min:11|max:11',
            'pname' => 'required',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'gender' => 'required',
            'year' => 'required|max:1',
            'major' => 'required',
        ]);
        try {
            Student::create([
                'idstudent' => $req->idstudent,
                'pname' => $req->pname,
                'fname' => $req->fname,
                'lname' => $req->lname,
                'gender' => $req->gender,
                'year' => $req->year,
                'major' => $req->major,
            ]);
            return redirect()->route('home')->with('success', 'เพิ่มข้อมูลนักศึกษาเรียบร้อย!');
        } catch (\Exception $e) {
            return redirect()->route('addstudent')->with('fail', $e->getMessage());

        }
        
    }
    public function delete($id){
        try {
            Student::where('idstudent', $id)->delete();
            return redirect()->route('home')->with('success', 'ลบข้อมูลนักศึกษาเรียบร้อย!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('fail', $e->getMessage());
        }
    }

    public function edit($id){
        $student = Student::where('idstudent', $id)->first();
        // dd($student);
        return view('editStudent',compact('student'));
    }

    public function update(Request $req){
        $req->validate([
            'pname' => 'required',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'gender' => 'required',
            'year' => 'required|max:1',
            'major' => 'required',
        ]);
        try {
            $student = Student::where('idstudent', $req->idstudent)->first();
            // dd($student);
                $student->update([
                    'pname' => $req->pname,
                    'fname' => $req->fname,
                    'lname' => $req->lname,
                    'gender' => $req->gender,
                    'year' => $req->year,
                    'major' => $req->major,
                ]);
    
                return redirect()->route('home')->with('success', 'แก้ไขข้อมูลนักศึกษาเรียบร้อย!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('fail', $e->getMessage());
        }
    }
}
