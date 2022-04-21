<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;
use App\Models\Subject;
use App\Models\TestPaper;
use App\Models\SingleChoiceQuestion;
use App\Models\ProfessorSubject;
//use Session;
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
       // $subject = Session::get('subject');
        $subject = session()->get('subject');
       // $exam_key = Session::get('exam')->exam_key;
       $exam_key = session()->get('exam')->exam_key;
        $difficulty = $request->difficulty;
        $chapter_number = $request->chapter;
        $total_questions = $request->number_of_questions;
        
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
       
        // $user = Session::get('user');
         $user = session()->get('user');
        //$user = Session::get('user');
      //  $hasApprovalToSubject = Session::get('hasApprovalToSubject');
        $hasApprovalToSubject = session()->get('hasApprovalToSubject');
       // $subject = Session::get('subject');
        $subject = session()->get('subject');
        $subjectFromDb = Subject::where('id', $subject)->first();
        $examFromDb = Exam::where('id', $exam)->first();
       // Session::put('exam', $examFromDb);
        session()->put('exam', $examFromDb);
        $exam_key = $examFromDb->exam_key;
        $test_paper_questions = TestPaper::where('exam_key', $exam_key)->get();
        
        $questions = [];
        // dd($test_paper_questions);

        foreach($test_paper_questions as $test_paper_question){
            $question = SingleChoiceQuestion::where('id', $test_paper_question->question_id)->first();
            array_push($questions, $question);
        }
        
        // dd('working');
        
        return view('exams.show', [
            'user' => $user,
            'hasApprovalToSubject' => $hasApprovalToSubject,
            'subject' => $subjectFromDb,
            'exam' => $examFromDb,
            'questions' => $questions
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
}
