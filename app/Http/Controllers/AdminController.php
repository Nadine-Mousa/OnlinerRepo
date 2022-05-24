<?php

namespace App\Http\Controllers;

use App\Models\ProfessorSubject;
use App\Models\TempProfessor;
use App\Models\TempProfessorSubject;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Exam ;
use App\Models\Chapter ;
use App\Models\Role;

class AdminController extends Controller
{

    public function index()
    {
        //
    }

//Show requests

      public function show_professor_requests()
      {
          $usersCount=User::count();
          $subjectsCount=Subject::count();
          $professorssCount=TempProfessor::count();
          $examssCount=Exam::count();
          $DepartmentsCount=Department::count();
          $ChaptersCount=Chapter::count();


        

           $professors=TempProfessor::all();
           $someObj = ['prop1' => $usersCount,'prop2' => 'value2'];
           $professor_subjects = TempProfessorSubject::all();

           $students = User::where([
               'verified' => 0,
               'role' => 3
           ])->get();
        //    dd($professor_subjects);
           return view('admin.index')->with([
            'professors'=> $professors,
            'students' => $students,
            'professor_subjects'=> $professor_subjects,
           ])->with('usersCount',$usersCount)->with('subjectsCount',$subjectsCount)->with('professorssCount',$professorssCount)
           ->with('examssCount',$examssCount)->with('DepartmentsCount',$DepartmentsCount)->with('ChaptersCount',$ChaptersCount)
           ;
      }

      //reject professor

      public function reject_professor($professor)
      {
          $professorFromDb=TempProfessor::find($professor);
          $professorFromDb->delete();
          return redirect()->back();
      }
      //reject student
      public function reject_student($student)
      {
          $student= User::find($student);
          $student->delete();
          return redirect()->back();
      }
      //approve student
      public function approve_student($student)
      {
        $student= User::find($student);
        $student->verified = 1;
        $student->save();
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
        //dd($departmentFromDb->id);
        $subjects = Subject::where('department_id', $departmentFromDb->id)->get();
        foreach($subjects as $subject){
            $subject->delete();
        }
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

       //show levels 
   public function show_levels()
   {
    $user = session()->get('user');
    $levels = Level::all();
    return view('admin.levels.index',
     ['levels' => $levels,
      'user' => $user]);
   }

   //departments create
    public function levels_create()
    {
        return view('admin.levels.create');
    }
    public function levels_store(Request $request)
    {
        $this->validate($request, [

            'level_number' => 'required',
           
        ]);

        $level = Level::create([
            'level_number' => $request->level_number,
           
        ]);

        $level->save();
        return redirect()->route('dashboard.levels');


    }


    //levels edit
    public function levels_edit($level)
    {
        $levelFromDb = Level::find($level);
        return view('admin.levels.edit')->with('level', $levelFromDb);
    }

    //levels update

    public function levels_update(Request $request, $level)
    {
        $levelFromDb = Level::find($level);
        $this->validate($request, [

            'level_number' => 'required',
           
        ]);
        $levelFromDb-> level_number = $request->level_number;
      

        $levelFromDb->save();
        return redirect()->route('dashboard.levels');
    }

   //departments delete
    public function levels_delete($level)
    {

        $levelFromDb = Level::find($level);
        
        $subjects =  Subject::where('level_id', $levelFromDb->id)->get();
        foreach($subjects as $subject){
            $subject->delete();
        }
        $levelFromDb->delete();
        return redirect()->back();
    }

    ///////////
    ////////////////////////////////////////////////////////////
    ////////اللى ايه بتعمله/////////////////
    //show Subjects

 public function show_subjects()
 {
  $user = session()->get('user');
  $subjects = Subject::all();
  return view('admin.subjects.index',
   ['subjects' => $subjects,
    'user' => $user]);
 }
    //subjects create
    public function subjects_create()
    {
        $departments = Department::all();
        $levels = Level::all();
        return view('admin.subjects.create')->with([
            'departments' => $departments,
            'levels' => $levels
        ]);
    }


    //departments store

    public function subjects_store(Request $request)
    {
        $this->validate($request, [

            'subject_name' => 'required',
            'subject_description'=>'required',
            'chapter_count'=>'required',
            'department_id'=>'required',
            'level_id'=>'required'
        ]);

        $subject = Subject::create([
            'subject_name' => $request->subject_name,
            'subject_description' => $request->subject_description,
            'chapter_count'=>$request->chapter_count,
            'department_id'=>$request->department_id,
            'level_id'=>$request->level_id
        ]);

        $subject->save();
        return redirect()->route('dashboard.subjects');


    }
    //subject edit
    public function subjects_edit($subject)
    {
        $subjectFromDb = Subject::find($subject);
        $departments = Department::all();
        $levels = Level::all();
        return view('admin.subjects.edit')->with([
            'subject'=> $subjectFromDb,
            'departments'=> $departments,
            'levels' => $levels
        ]);
    }

    //subject update

    public function subjects_update(Request $request, $subject)
    {
        $subjectFromDb = Subject::find($subject);
        $this->validate($request, [

            'subject_name' => 'required',
            
            'subject_description'=>'required',
            'chapter_count'=>'required',
            'department_id'=>'required',
            'level_id'=>'required'
        ]);
        $subjectFromDb-> subject_name = $request->subject_name;
       
        $subjectFromDb->subject_description =$request->subject_description;
        $subjectFromDb->chapter_count =$request->chapter_count;
        $subjectFromDb->department_id =$request->department_id;
        $subjectFromDb->level_id =$request->level_id;

        $subjectFromDb->save();
        return redirect()->route('dashboard.subjects');
    }

//subject delete
public function subjects_delete($subject)
{
    //where('id', $professor_subject)
$questionsSubject=Question::where('subject_id',$subject)->select();



if($questionsSubject!=null){
    $questionsSubject->delete();
    foreach ($questionsSubject as $question){
        $question->delete();
    }
}
    $subjectFromDb = Subject::find($subject);
    //dd($subjectFromDb);
    if($subjectFromDb!=null){
        $subjectFromDb->delete();
    }
    $chapters = Chapter::where('subject_id', $subjectFromDb->id)->get();
    foreach($chapters as $chapter){
        $chapter->delete();
    }

    return redirect()->back();
}


//////////////////////////////creat exam//////////




//show createxam
public function show_exams()
{
 $user = session()->get('user');
 $exams = Exam::all();
 return view('admin.exams.index',
  ['exams' => $exams,
   'user' => $user]);
}
   //createxam create
   public function exams_create()
   {
       return view('admin.exams.create');
   }


   //Exams store

   public function exams_store(Request $request)
   {
       $this->validate($request, [
          'exam_key' => 'required',
           'exam_name' => 'required',
           'duration' => 'required',
           'created_at'=>'required',
           'updated_at'=>'required',
           'start_time'=>'required',
           'end_time'=>'required',
           'total_questions'=>'required',
           'is_dynamic'=>'required',
           'professor_id'=>'required',
           'subject_id'=>'required',
           'department_id'=>'required',
           'level_id'=>'required',




       ]);

       $exam =Exam::create([
           'exam_key' => $request->exam_key,
           'exam_name' => $request->exam_name,
           'duration' => $request->duration,
           'created_at'=>$request->created_at,
           'updated_at'=>$request->updated_at,
           'total_questions'=>$request->total_questions,
           'start_time'=>$request->start_time,
           'end_time'=>$request->end_time,
           'is_dynamic'=>$request->is_dynamic,
           'professor_id'=>$request->professor_id,
           'subject_id'=>$request->subject_id,
           'department_id'=>$request->department_id,
           'level_id'=>$request->level_id,



       ]);

       $exam->save();
       return redirect()->route('dashboard.exams');


   }
   //createxam edit
   public function exams_edit($exam)
   {
       $examFromDb = Exam::find($exam);
       return view('admin.exams.edit')->with('exam', $examFromDb);
   }

   //createxam update

   public function exams_update(Request $request, $exam)
   {
       $examFromDb = Exam::find($exam);
       $this->validate($request, [

        'exam_key' => 'required',
        'exam_name' => 'required',
        'duration' => 'required',
        'created_at'=>'required',
        'updated_at'=>'required',
        'start_time'=>'required',
        'end_time'=>'required',
        'total_questions'=>'required',

        'is_dynamic'=>'required',
        // 'professor_id'=>$request->professor_id,
        // 'subject_id'=>$request->subject_id,
        // 'department_id'=>$request->department_id,
        // 'level_id'=>$request->level_id,
       ]);
       $examFromDb-> exam_key = $request->exam_key;
       $examFromDb-> exam_name = $request->exam_name;
       $examFromDb->duration =$request->duration;
       $examFromDb->created_at =$request->created_at;
       $examFromDb->updated_at =$request->updated_at;
       $examFromDb->start_time =$request->start_time;
       $examFromDb->end_time =$request->end_time;
       $examFromDb->total_questions =$request->total_questions;
       $examFromDb->is_dynamic =$request->is_dynamic;
    //    $examFromDb->professor_id=$request->professor_id;
    //    $examFromDb->subject_id=$request->subject_id;
    //    $examFromDb->department_id=$request->department_id;
    //    $examFromDb->level_id=$request->level_id;



       $examFromDb->save();
       return redirect()->route('dashboard.exams');
   }

//Exam delete
public function exams_delete($exam)
{
   $examFromDb = Exam::find($exam);
   if($examFromDb!=null){
       $examFromDb->delete();
   }

   return redirect()->back();
}


///////// add,edit,delete professor




public function show_professors()
 {
  $user = session()->get('user');
  $professors = User::where('role', 2)->get();
  return view('admin.professors.index',
   ['professors' => $professors,
    'user' => $user]);
 }

  //show students

  public function show_students()
  {
    $user = session()->get('user');
    $students = User::where('role', 3)->get();
    return view('admin.students.index',
    ['students' => $students,
     'user' => $user]);
  }

    //professor create
    public function professors_create()
    {
        $departments = Department::all();
        $levels = Level::all();
       
        $roles= Role::where('id', '!=' , 1)->orWhereNull('id')->get();

        return view('admin.professors.create',
         ['departments' => $departments,
          'levels' => $levels,
          'roles' => $roles
        ]);
       
    }

   


    //professor store

    public function professors_store(Request $request)
    {
        $this->validate($request, [
            'first_name'=>'required',
            'last_name'=>'required',
            'password'=>'required',
            'email'=>'required',
            'verified'=>'required',
            'role'=>'required',
            'department_id' => 'required',
            'level_id'=>'required',
           
        ]);

        $professor = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'password'=>$request->password,
            'email'=>$request->email,
            'verified'=>$request->verified,
            'role'=>$request->role,
            'department_id' => $request->department_id,
            'level_id' => $request->level_id,
           


        ]);

        $professor->save();
        return redirect()->route('dashboard.professors');


    }
    //professor edit
    public function professors_edit($professor)
    {
        $professorFromDb = User::find($professor);
        $departments = Department::all();
        $levels = Level::all();

       
        if ($professorFromDb!=null){
            return view('admin.professors.edit')->with([
                'professor'=> $professorFromDb,
                'departments' => $departments,
              'levels' => $levels
            ]);
        }
    }

    //professor update

    public function professors_update(Request $request, $professor)
    {
        $professorFromDb = User::find($professor);
        $this->validate($request, [

            'first_name'=>'required',
            'last_name'=>'required',
            'password'=>'required',
            'email'=>'required',
            'verified'=>'required',
            'role'=>'required',
            'department_id' => 'required',
            'level_id'=>'required',
           

        ]);
        $professorFromDb->first_name =$request->first_name;
        $professorFromDb->last_name =$request->last_name;
        $professorFromDb->password =$request->password;
        $professorFromDb->email =$request->email;
        $professorFromDb->verified =$request->verified;
        $professorFromDb->role =$request->role;
        $professorFromDb-> department_id= $request->department_id;
        $professorFromDb->level_id =$request->level_id;
      
        $professorFromDb->save();
        return redirect()->route('dashboard.professors');
    }

//professor delete

//Exam delete
public function professors_delete($professor)
{
   $professorFromDb = User::find($professor);
   if($professorFromDb!=null){
       $professorFromDb->delete();
   }

   return redirect()->back();
}

//edit student

public function student_edit($student)
{
    $studentFromDb = User::find($student);
    $departments = Department::all();
    $levels = Level::all();

   
    if ($studentFromDb!=null){
        return view('admin.students.edit')->with([
            'student'=> $studentFromDb,
            'departments' => $departments,
          'levels' => $levels
        ]);
    }
}

//update student
public function student_update(Request $request, $student)
{
    $studentFromDb = User::find($student);
    $this->validate($request, [

        'first_name'=>'required',
        'last_name'=>'required',
        'password'=>'required',
        'email'=>'required',
        'verified'=>'required',
        'role'=>'required',
        'department_id' => 'required',
        'level_id'=>'required',
       

    ]);
    $studentFromDb->first_name =$request->first_name;
    $studentFromDb->last_name =$request->last_name;
    $studentFromDb->password =$request->password;
    $studentFromDb->email =$request->email;
    $studentFromDb->verified =$request->verified;
    $studentFromDb->role =$request->role;
    $studentFromDb-> department_id= $request->department_id;
    $studentFromDb->level_id =$request->level_id;
  
    $studentFromDb->save();
    return redirect()->route('dashboard.students');
}
//delete student

public function student_delete($student)
{
    $studentFromDb = User::find($student);
    if($studentFromDb!=null){
        $studentFromDb->delete();
    }
 
    return redirect()->back();
}

//chapters
public function show_chapters()
   {
    $user = session()->get('user');
    $chapters = Chapter::all();
    return view('admin.chapters.index',
     ['chapters' => $chapters,
      'user' => $user]);
   }

   //chapters create
    public function chapters_create()
    {
        $subjects = Subject::all();
        return view('admin.chapters.create')->with('subjects', $subjects);
    }

    //chapters store

    public function chapters_store(Request $request)
    {
        $this->validate($request, [

            'chapter_num'=> 'required',
            'chapter_name'=> 'required',
            'chapter_desc'=> 'required',
            'subject_id'=> 'required',
        ]);

        $chapter = Chapter::create([
            'chapter_num'=> $request->chapter_num,
            'chapter_name'=> $request->chapter_name,
            'chapter_desc'=> $request->chapter_desc,
            'subject_id'=>  $request->subject_id,
        ]);

        $chapter->save();
        return redirect()->route('dashboard.chapters');


    }

    //chapters edit
    public function chapters_edit($chapter)
    {
        $chapterFromDb = Chapter::find($chapter);
        $subjects = Subject::all();
        return view('admin.chapters.edit')->with([
            'chapter'=> $chapterFromDb,
            'subjects' => $subjects
        ]);
    }

    //chapters update

    public function chapters_update(Request $request, $chapter)
    {
        $chapterFromDb = Chapter::find($chapter);
        $this->validate($request, [
            'chapter_num'=> 'required',
            'chapter_name'=> 'required',
            'chapter_desc'=> 'required',
            'subject_id'=> 'required',
        ]);
        $chapterFromDb-> chapter_num = $request->chapter_num;
        $chapterFromDb-> chapter_name = $request->chapter_name;
        $chapterFromDb-> chapter_desc = $request->chapter_desc;
        $chapterFromDb-> subject_id = $request->subject_id;
        // $chapterFromDb->  = $request->;



        $chapterFromDb->save();
        return redirect()->route('dashboard.chapters');
    }

   //chapters delete
    public function chapters_delete($chapter)
    {

        $chapterFromDb = Chapter::find($chapter);
        $chapterFromDb->delete();
        return redirect()->back();
    }

    public function GetCount(){
        $someObj = ['prop1' => 'value1','prop2' => 'value2'];

        $Statistics=['users'=>$someObj];
        return view('admin.index')->with(['users'=>$someObj]);
    }

    public function services()
    {

    }
}




