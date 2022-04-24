<?php

namespace App\Http\Controllers;

use App\Models\ProfessorSubject;
use App\Models\TempProfessor;
use App\Models\TempProfessorSubject;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
  
    public function index()
    {
        //
    }

//Show requests
    
      public function show_professor_requests()
      {
           $professors=TempProfessor::all();
           $professor_subjects = TempProfessorSubject::all();
           return view('admin.index')->with([
            'professors'=> $professors,
            'professor_subjects'=> $professor_subjects
           ]);
      }
      
      //reject professor

      public function reject_professor($professor)
      {
          $professorFromDb=TempProfessor::find($professor);
          $professorFromDb->delete();
          return redirect()->back();
      }

      //approve professor

      public function approve_professor($professor)
      {
        $professorFromDb = TempProfessor::where('id', $professor)->first();

        $user = new User();
        
        $user->first_name = $professorFromDb->first_name;
        $user->last_name = $professorFromDb->last_name;
        $user->password = $professorFromDb->password;
        $user->email = $professorFromDb->email;
        $user->department_id = $professorFromDb->department_id;
        $user->level_id = $professorFromDb->level_id;
        $user->role = $professorFromDb->role;

        $user->save();

        $professorFromDb->delete();
        return redirect()->back();
      }

    

     

   //reject professor subject

   public function reject_professor_subject($professor_subject)
   {
    $professor_subjectFromDB = TempProfessorSubject::find($professor_subject);
    $professor_subjectFromDB->delete();
    return redirect()->back();
        
   }

   //approve professor subject
   public function approve_professor_subject($professor_subject)
   {
    $professor_subjectFromDB = TempProfessorSubject::where('id', $professor_subject)->first();
    $prof_subject = new ProfessorSubject();

    $prof_subject->professor_id = $professor_subjectFromDB->professor_id;
    $prof_subject->subject_id = $professor_subjectFromDB->subject_id;

    $prof_subject->save();

    $professor_subjectFromDB->delete();
    return redirect()->back();
   

   }
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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
