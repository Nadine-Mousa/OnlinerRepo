<?php

namespace App\Http\Controllers;

use App\Models\ProfessorSubject;
use App\Models\TempProfessor;
use App\Models\TempProfessorSubject;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

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

   //show departments
   public function show_departments()
   {
    $user = session()->get('user');
    $departments = Department::all();
    return view('admin.departments.index',
     ['departments' => $departments,
      'user' => $user]);
   }

   //departments create
    public function departments_create()
    {
        return view('admin.departments.create');
    }

    //departments store

    public function departments_store(Request $request)
    {
        $this->validate($request, [
            
            'dep_name' => 'required',
            'dep_description' => 'required',
        ]);

        $department = Department::create([
            'dep_name' => $request->dep_name,
            'dep_description' => $request->dep_description,
        ]);
 
        $department->save();
        return redirect()->route('dashboard.departments');
   
 
    }

    //departments edit
    public function departments_edit($department)
    {
        $departmentFromDb = Department::find($department);
        return view('admin.departments.edit')->with('department', $departmentFromDb);
    }

    //departments update
    
    public function departments_update(Request $request, $department)
    {
        $departmentFromDb = Department::find($department);
        $this->validate($request, [
            
            'dep_name' => 'required',
            'dep_description' => 'required',
        ]);
        $departmentFromDb-> dep_name = $request->dep_name;
        $departmentFromDb-> dep_description = $request->dep_description;

        $departmentFromDb->save();
        return redirect()->route('dashboard.departments');
    }

   //departments delete
    public function departments_delete($department)
    {
        
        $departmentFromDb = Department::find($department);
        $departmentFromDb->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
