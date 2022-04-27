<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\Models\Role;
use App\Models\ProfessorSubject;
use App\Models\TempProfessorSubject;
use Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $level)
    {
         $user = session()->get('user');
       // $user = Session::get('user');
        //$department = Session::get('department');
        $department = session()->get('department');
       // Session::put('level', $level);
       session()->put('level', $level);
        $subjects = Subject::where([
            ['department_id', '=', $department],
            ['level_id', '=', $level]
        ])->get();
        return view('subjects.index', [
            'subjects' => $subjects, 
            'user'=>$user, 
            'department' =>$department, 
            'level' => $level]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $subject)
    {
        //$user = Session::get('user');
        $user = session()->get('user');
        
       // $department = Session::get('department');
       $department = session()->get('department');
       //dd($department);
       // $level = Session::get('level');
       $level = session()->get('level');
       // Session::put('subject', $subject);
       session()->put('subject', $subject);
        $subjectFromDb = Subject::where('id', $subject)->first();

        $professor_subject = ProfessorSubject::where([
            ['professor_id', '=', $user->id],
            ['subject_id', '=', $subject]])->first();
        

        $hasApprovalToSubject = false;
        if($professor_subject != null){
            $hasApprovalToSubject = true;
        }
        

        $role = Role::where('id', $user->role)->first();
        if($role != null){
            $role = $role->role_name;
        }
        else {
            $role = "student";
        }
       // Session::put('role', $role);
        session()->put('role', $role);
        if($role == "admin"){
            $hasApprovalToSubject = true;
        }
        $is_student=false;
        $is_prof=false;
        $currentRole = $user->role;
       // dd($currentRole);
          if($currentRole == 3) {
               $is_student=true;
          }
         // dd($is_student);
         if($currentRole == 2)
         {
             $is_prof = true;
         }

        //Session::put('hasApprovalToSubject', $hasApprovalToSubject);
        session()->put('hasApprovalToSubject', $hasApprovalToSubject);

        return view('subjects.show', ['user' => $user, 
        'department' =>$department,
         'level' => $level,
         'subject' => $subjectFromDb,
         'hasApprovalToSubject' => $hasApprovalToSubject,
         'is_student' => $is_student,
         'is_prof' => $is_prof
        ]);
    }

    //ask for approve
    public function ask_for_approve($subject)
    {
        $user = session()->get('user');
        $professor_subject=new TempProfessorSubject();
        $professor_subject->professor_id = $user->id;
        $professor_subject->subject_id = $subject;

        $professor_subject->save();
        return redirect()->back();
    }



    public function edit($id){

    }
        //
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    
}
