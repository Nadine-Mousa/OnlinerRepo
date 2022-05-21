<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;
use App\Models\Option;
use App\Models\Subject;
use App\Models\TestPaper;
use App\Models\SingleChoiceQuestion;
use App\Models\ProfessorSubject;
use App\Models\ExamStructure;

use App\Models\StudentAnswer;
use App\Models\TakenExam;


// use Session;
//use Symfony\Component\HttpFoundation\Session\Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       // $subject = Session::get('subject');
          $subject = session()->get('subject');
       // $user = Session::get('user');
        $user = session()->get('user');
        $subjectFromDb = Subject::where('id', $subject)->first();
      //  $hasApprovalToSubject = Session::get('hasApprovalToSubject');
         $hasApprovalToSubject = session()->get('hasApprovalToSubject');
        $exams = Exam::where('subject_id', $subject)->get();

       
        
        
        return view('exams.index', [
         'exams' => $exams,
         'user' => $user,
         'subject' =>$subjectFromDb,
         'hasApprovalToSubject' => $hasApprovalToSubject
        ]);
    }


    //Show students exams

    public function show_student_exams()
    {
        // dd('here are the exams the student have taken before');
          $subject = session()->get('subject');
          $user = session()->get('user');
          $subjectFromDb = Subject::where('id', $subject)->first();
          
          $is_student=false;
          $currentRole = $user->role;
            if($currentRole == 3) {
                 $is_student=true;
            }

          $student_exams=TakenExam::where('student_id', $user->id)->get();
         //dd($student_exams->exams->exam_name) ;

        //  dd($student_exams);
          return view('exams.show_student_exams')->with([
            'student_exams'=> $student_exams,
             'is_student'=> $is_student,
             'subject' =>$subjectFromDb,
             'user' => $user,

          ]);
    }

    //show student exam
    public function show_student_exam($exam)
    {

        $user = session()->get('user');
        $examFromDb = Exam::where('id', $exam)->first();
        $taken_exam = TakenExam::where('exam_id', $exam)->first();
        
        $student_answers = StudentAnswer::with('option')->where([
            ['exam_key', '=', $taken_exam->exam_key],
            ['student_id', '=', $user->id],
        ])->get();

        // dd($student_answers);

        return view('exams.show_student_exam', [
            'student_answers' => $student_answers,
            'taken_exam' => $taken_exam,
            'exam' => $examFromDb

        ]);
    }
   
    public function create_exam()
    {
        $subject = session()->get('subject');
        // $user = Session::get('user');
       $user = session()->get('user'); 
       $department = session()->get('department');
       $level = session()->get('level');
        return view('exams.create', [
            'user' => $user,
            'subject' =>  $subject,
            'department' => $department,
            'level' => $level,
        ]);
    }

    public function store_exam(Request $request)
    {
        $subject = session()->get('subject');
        // $user = Session::get('user');
       $user = session()->get('user'); 
       $department = session()->get('department');
       $level = session()->get('level');


       $this->validate($request, [
           'exam_key' => 'required',
            'exam_name' => 'required',
            'duration' => 'required',
            
            'start_time'=>'required',
            'end_time'=>'required',
            'total_questions'=>'required',
            'is_dynamic'=>'required',
            
 
 
 
 
        ]);
 
        $exam =Exam::create([
            'exam_key' => $request->exam_key,
            'exam_name' => $request->exam_name,
            'duration' => $request->duration,
           
            'total_questions'=>$request->total_questions,    
            'start_time'=>$request->start_time,    
            'end_time'=>$request->end_time,  
            'is_dynamic'=>$request->is_dynamic,       
            'professor_id'=>$user,
            'subject_id'=>   $subject ,      
            'department_id'=> $department,       
            'level_id'=>$level       
 
 
 
        ]);

      $exam->save();
      return redirect()->route('exams.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = session()->get('subject');
        $exam_key = session()->get('exam')->exam_key;
        $is_dynamic = session()->get('exam')->is_dynamic;
        $difficulty = $request->difficulty;
        $chapter_number = $request->chapter;
        $total_questions = $request->number_of_questions;
        if($is_dynamic){
            $structure = ExamStructure::where([
                ['exam_key','=', $exam_key],
                ['subject_id','=', $subject],
                ['chapter_number','=', $chapter_number],
                ['difficulty','=', $difficulty]
            ])->first();

            if($structure == null){
                $structure = new ExamStructure();
                $structure->exam_key = $exam_key;
                $structure->subject_id = $subject;
                $structure->chapter_number = $chapter_number;
                $structure->difficulty = $difficulty;
                $structure->number_of_questions = $total_questions;
                $structure->save();
            }
            else {
                $structure = ExamStructure::where([
                    ['exam_key','=', $exam_key],
                    ['subject_id','=', $subject],
                    ['chapter_number','=', $chapter_number],
                    ['difficulty','=', $difficulty]
                ])->update(['number_of_questions' =>
                    ($structure->number_of_questions + $total_questions)]);
                
                // $structure->update([
                // 'number_of_questions' =>
                //  ($structure->number_of_questions + $total_questions)]);
            }

        }
        else {
            $questions = SingleChoiceQuestion::where([
                ['subject_id','=', $subject],
                ['difficulty','=', $difficulty],
                ['chapter_number','=', $chapter_number]
    
            ])->inRandomOrder()->limit($total_questions)->get();
    
            foreach($questions as $question){
                $test_paper = new TestPaper();
                $test_paper->exam_key = $exam_key;
                $test_paper->question_id = $question->id;
                $test_paper->save();
            }
        }
        
        return redirect()->route('exams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($exam)
    {
       
         $user = session()->get('user');
        $hasApprovalToSubject = session()->get('hasApprovalToSubject');
        $subject = session()->get('subject');
        $subjectFromDb = Subject::where('id', $subject)->first();
        $examFromDb = Exam::where('id', $exam)->first();
        session()->put('exam', $examFromDb);
        $exam_key = $examFromDb->exam_key;

        $is_dynamic = $examFromDb -> is_dynamic;

        $questions = [];
        $structures = [];

        if($is_dynamic){
            $structures = ExamStructure::where('exam_key', $exam_key)->get();
        }
        else {
            $test_paper_questions = TestPaper::where('exam_key', $exam_key)->get();
            foreach($test_paper_questions as $test_paper_question){
                $question = SingleChoiceQuestion::where('id', $test_paper_question->question_id)->first();
                array_push($questions, $question);
            }
        }
        
        
        return view('exams.show', [
            'user' => $user,
            'hasApprovalToSubject' => $hasApprovalToSubject,
            'subject' => $subjectFromDb,
            'exam' => $examFromDb,
            'questions' => $questions,
            'is_dynamic' => $is_dynamic, 
            'structures' => $structures
        ]);
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
    public function takeExam(Request $request){
        $exam_key = $request->exam_key;
        $user = session()->get('user');
        $exam = Exam::where('exam_key', $exam_key)->first();
        if($exam == null){
            return redirect()->route('home');
        }
        session()->put('exam', $exam);


        // check if the student has taken this exam before.
        $taken_exam = TakenExam::where([
            ['exam_key', '=', $exam_key],
            ['student_id', '=', $user->id],
        ])->first();

        if($taken_exam != null){
            return redirect()->route('student_exam', ['exam' => $exam->id]);
        }
        

        $questions = [];
        if($exam->is_dynamic == true){
            // get stucture
            $structures = ExamStructure::where('exam_key', $exam_key)->get();
            // get questions
            foreach($structures as $structure){
                $questions_of_structure = SingleChoiceQuestion::with('options')->where([
                    ['subject_id', '=', $structure->subject_id],
                    ['chapter_number', '=', $structure->chapter_number],
                    ['difficulty', '=', $structure->difficulty]
                ])->inRandomOrder()->limit($structure->number_of_questions)->get();
                // $questions_of_structure = $questions_of_structure->shuffle();
                foreach($questions_of_structure as $question){
                    array_push($questions, $question);
                }
            }

            shuffle($questions);
            // dd($questions);
        }
        else {
            // else static -> get questions
            $test_paper_questions = TestPaper::where('exam_key', $exam_key)->inRandomOrder()->get();
            // $test_paper_questions = $test_paper_questions->shuffle();
            foreach($test_paper_questions as $question_in_test_paper){
                $question = SingleChoiceQuestion::with('options')->where('id', $question_in_test_paper->question_id)->first();
                array_push($questions, $question);
            }
        }
        $total_exam_marks = 0.0;

        $user = session()->get('user');
        
        foreach($questions as $question){
            // dd($question->options);
            $question->options = $question->options->shuffle();
            $total_exam_marks += $question->options->sum('points');
        }
        session()->put('total_exam_marks', $total_exam_marks );
        
        

        return view('exams.quiz',
         ['questions' => $questions,
         'exam' => $exam,
         'user' => $user]
        );
    }

    public function storeAnswers(Request $request){
        // options chosen
        $options = Option::find(array_values($request->input('questions')));
        // total score of the student
        $scored_points = $options->sum('points');

        // store in taken exam
        $taken_exam = new TakenExam();
        $taken_exam->exam_key = session()->get('exam')->exam_key;
        $taken_exam->student_id = session()->get('user')->id;
        $taken_exam->exam_id = session()->get('exam')->id;
        $taken_exam->total_score = $scored_points;
        $total_exam_marks = session()->get('total_exam_marks' );
        $taken_exam->marks = $total_exam_marks;
        $taken_exam->save();        

        // store student chosen options of the exam in student aswers table
        foreach($options as $option){
            $answer = new StudentAnswer();
            $answer->option_id = $option->id;
            $answer->student_id = session()->get('user')->id;
            $answer->exam_key = session()->get('exam')->exam_key;
            $answer->save();
        }


        return redirect()->route('exams.student_exams');
    }

    public function show_results($exam)
    {
        $user = session()->get('user');
        $hasApprovalToSubject = session()->get('hasApprovalToSubject');
        $subject = session()->get('subject');
        $subjectFromDb = Subject::where('id', $subject)->first();
       // $examFromDb = Exam::where('id', $exam)->first();
       
       // $exam_key = $examFromDb->exam_key;
       // $exam = session()->get('exam');
        $results=TakenExam::where('exam_id', $exam)->get();
       // session()->put('exam', $results);
        
        return view('exams.show_results')->with([
            'user' => $user,
            'results'=> $results,
            'hasApprovalToSubject' =>  $hasApprovalToSubject,
        ]);
    }
}
