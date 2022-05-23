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

        $subject = session()->get('subject');
        $subjectFromDb = Subject::where('id', $subject)->first();
        $examFromDb = TakenExam::where('id', $exam)->first();

        session()->put('exam', $examFromDb);
        $exam_key = $examFromDb->exam->exam_key;

        $is_dynamic = $examFromDb->exam->is_dynamic;

        $questions = [];
        $structures = [];
        $answers = [];

        if($is_dynamic){
            $structures = ExamStructure::where('exam_key', $exam_key)->get();
        }
        else {
            $test_paper_questions = TestPaper::where('exam_key', $exam_key)->get();
            foreach($test_paper_questions as $test_paper_question){
                $question = SingleChoiceQuestion::where('id', $test_paper_question->question_id)->first();
              //  $answer = StudentAnswer::where('question_id', $test_paper_question->question_id)->first();

                array_push($questions, $question);
               // array_push($answers, $answer);
            }
        }


        return view('exams.show_student_exam', [
            'user' => $user,
           // 'answers' => $answers,
            'subject' => $subjectFromDb,
            'exam' => $examFromDb,
            'questions' => $questions,
            'is_dynamic' => $is_dynamic,
            'structures' => $structures
        ]);
    }


    public function create()
    {

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

        // check if the user has taken this exam before.
        $taken_exam = TakenExam::where('exam_key', $exam_key)->first();
        if($taken_exam != null){
            return 'Answers can be submitted only once';
        }

        $exam = Exam::where('exam_key', $exam_key)->first();
        session()->put('exam', $exam);

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
                ])->inRandomOrder()->limit($structure->number_of_questions)->get()->toArray();
                $questions_of_structure = $questions_of_structure->shuffle();
                foreach($questions_of_structure as $question){
                    array_push($questions, $question);
                }
            }
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

        $user = session()->get('user');
        foreach($questions as $question){

            $question->options = $question->options->shuffle();
        }

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
        $taken_exam->total_score = $scored_points;
        $taken_exam->save();

        // store student chosen options of the exam in student aswers table
        foreach($options as $option){
            $answer = new StudentAnswer();
            $answer->option_id = $option->id;
            $answer->student_id = session()->get('user')->id;
            $answer->exam_key = session()->get('exam')->exam_key;
            $answer->save();
        }


        // redirect me to the exams I've taken with the link show results on each of them


        return 'redirected to the exams I have taken before';
        // dd($total_points);
    }
}
