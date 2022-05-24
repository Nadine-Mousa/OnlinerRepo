<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;
use App\Models\Option;
use App\Models\Subject;
use App\Models\TestPaper;
use App\Models\Chapter;
use App\Models\Difficulty;
// use App\Models\SingleChoiceQuestion;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\ProfessorSubject;
use App\Models\ExamStructure;
use Carbon\Carbon;
use DateTime;
//use Str;
use Illuminate\Support\Str;
use App\Models\StudentAnswer;
use App\Models\TakenExam;

// use Collection;
use Illuminate\Support\Collection;


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
                

        if($subject == null ){
            return redirect()->back()->with('quizTaken', 'You have taken taken successfully');
        }

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
        // dd($exam);

        // dd('here are the results');
        $user = session()->get('user');
        // dd($user);
        $examFromDb = Exam::where('id', $exam)->first();

        $taken_exam = TakenExam::where([
            ['exam_id', $exam],
            ['student_id', $user->id]
        ])->first();
        // dd($taken_exam);


        $student_answers = StudentAnswer::with('option')->where([
            ['exam_key', '=', $taken_exam->exam_key],
            ['student_id', '=', $user->id],
            ['option_id', '!=' , -1]
        ])->get();


        $not_answerd = StudentAnswer::with('option')->where([
            ['exam_key', '=', $taken_exam->exam_key],
            ['student_id', '=', $user->id],
            ['option_id', '=' , -1]
        ])->get();
        $questions_not_answered = [];

        foreach($not_answerd as $answer){
            $question = Question::find($answer->question_id);
            array_push($questions_not_answered, $question);
        }


        $student_answers_single = [];
        $student_answers_multiple = [];
        $student_options_multiple = new Collection();
        $student_options_multiple_ids = new Collection();
        $questions_multiple = [];
        foreach($student_answers as $student_answer){
            $question = Question::find($student_answer->question_id);
            if($question->question_type == 3){
                // the question has more than one correct answer
                array_push($student_answers_multiple , $student_answer);
                $option = Option::find($student_answer->option_id);
                // array_push($student_options_multiple , $option);
                $student_options_multiple->push($option);
                $student_options_multiple_ids->push($option->id);
                array_push($questions_multiple , $question);
            }
            else {
                array_push($student_answers_single , $student_answer);
            }
        }

        $questions_multiple = array_unique($questions_multiple);


        return view('exams.show_student_exam', [
            'student_answers_single' => $student_answers_single,
            'questions_multiple' => $questions_multiple,
            'student_options_multiple' => $student_options_multiple,
            'student_answers_multiple' => $student_answers_multiple,
            'taken_exam' => $taken_exam,
            'exam' => $examFromDb,
            'questions' => $questions_not_answered,
            'student_options_multiple_ids' => $student_options_multiple_ids,

        ]);
    }

    public function create_exam()
    {
        $subject = session()->get('subject');
        // $user = Session::get('user');
       $user = session()->get('user');
       $subject = Subject::find($subject);
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
        // validate the model
        $validated = $request->validate([
            'exam_key' => 'required|unique:exams,exam_key',
            'exam_name' => 'required',
            'duration' => 'required',
            'exam_access' => 'required',
            'start_from' => 'required',
            'marks' => 'required',
            'is_dynamic' => 'required'
        ]);

        // dd('here to store the values');
        // $end_time = Carbon::parse($request->end_time)->format('Y-m-d\ H:i:s');
        // $end_time = new DateTime($end_time);
        // $interval = $start_time->diff($end_time);
        // dd($interval->h);

        $start_from = Carbon::parse($request->start_from)->format('Y-m-d\ H:i:s'); // string
        // $start_from = strtotime( $start_from );
        // $start_from->getTimestamp();
        // dd($start_from);
        $subject = session()->get('subject');
        $user = session()->get('user');
        $department = session()->get('department');
        $level = session()->get('level');

        if( $request->is_dynamic == "true" ) $is_dynamic = true;
        else $is_dynamic = false;

        if($request->exam_access == "anytime") $is_accessed_anytime = true;
        else $is_accessed_anytime = false;


        $exam_key =  Str::upper($request->exam_key);
        // dd($department);
        $exam =Exam::create([
            'exam_key' => $exam_key,
            'exam_name' => $request->exam_name,
            'duration' => $request->duration,
            'start_from'=>$start_from,
            'is_dynamic'=>$is_dynamic,
            'professor_id'=>$user->id,
            'subject_id'=> $subject ,
            'department_id'=> $department,
            'total_questions' => 0,
            'level_id'=>$level,
            'is_accessed_anytime' => $is_accessed_anytime,
            'is_accepting_responses' => false,
            'marks' => $request->marks
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
        // dd('here to store questions');
        $subject = session()->get('subject');
        //dd($subject->chapter_count);
        $exam_key = session()->get('exam')->exam_key;
        $exam_id = session()->get('exam')->id;
        $is_dynamic = session()->get('exam')->is_dynamic;

        $chapter_id = $request->chapter;
        $chapter_number = $request->chapter;
        $total_questions = $request->number_of_questions;
        if($is_dynamic){
            $structure = ExamStructure::where([
                ['exam_key','=', $exam_key],
                ['subject_id','=', $subject],
                ['chapter_number','=', $chapter_id],
                ['difficulty','=', $request->difficulty],
                ['question_type', '=', $request->question_type]
            ])->first();

            if($structure == null){
                $structure = new ExamStructure();
                $structure->exam_key = $exam_key;
                $structure->subject_id = $subject;
                $structure->chapter_number = $chapter_id;
                $structure->difficulty = $request->difficulty;
                $structure->question_type = $request->question_type;
                $structure->number_of_questions = $total_questions;
                $structure->save();
            }
            else {
                $structure = ExamStructure::where([
                    ['exam_key','=', $exam_key],
                    ['subject_id','=', $subject],
                    ['chapter_number','=', $chapter_number],
                    ['difficulty','=', $request->difficulty],
                    ['question_type', '=', $request->question_type]
                ])->update(['number_of_questions' =>
                    ($structure->number_of_questions + $total_questions)]);

            }

        }
        else {
            $questions = Question::where([
                ['subject_id','=', $subject],

                ['difficulty','=', $request->difficulty],
                ['chapter_id','=', $request->chapter]

            ])->inRandomOrder()->limit($total_questions)->get();

            foreach($questions as $question){
                $test_paper = new TestPaper();
                $test_paper->exam_key = $exam_key;
                $test_paper->question_id = $question->id;
                // Check if the exam already contains this question
                $already_exists_question = TestPaper::where([
                    ['exam_key', $exam_key],
                    ['question_id', $question->id]
                ])->first();
                if($already_exists_question == null){
                    $test_paper->save();
                }
            }
        }


        return redirect()->route('exams.show_exam', ['exam' => $exam_id]);

    }



   //edit & delete exam structure
    public function edit_structure($structure)
    {

        $structureFromDb = ExamStructure::where('id', $structure)->first();
        $difficulties = Difficulty::all();
        $subject = session()->get('subject');
        $subjectFromDb = Subject::where('id', $subject)->first();
        $exam_key = session()->get('exam')->exam_key;
        $exam_id = session()->get('exam')->id;
    //    $chapter_id = $request->chapter;
    //    $chapter_number = $request->chapter;

        return view('exams.edit_structure')->with([
            'structure'=> $structureFromDb,
            'subject'=>$subjectFromDb,
            'exam_key'=>$exam_key,
            'exam_id'=>$exam_id,
            'difficulties'=>$difficulties

        ]);

    }
    public function update_structure(Request $request, $structure)
    {
        $structureFromDb = ExamStructure::find($structure);
        //dd($structureFromDb->id);
        $subject = session()->get('subject');
        $subjectFromDb=Subject::where('id', $subject)->first();
       // dd($subjectFromDb->chapter_count);
        $exam_key = session()->get('exam')->exam_key;
        $exam_id = session()->get('exam')->id;

        $this->validate($request, [
            'chapter_number' => 'required',
            'difficulty' => 'required',
            'number_of_questions' => 'required',

        ]);

        $structureFromDb-> subject_id = $subjectFromDb->id;
        $structureFromDb->  exam_key = $exam_key;
        $structureFromDb-> chapter_number = $request->chapter;

        $structureFromDb-> difficulty = $request->difficulty;
       $structureFromDb-> number_of_questions = $request->number_of_questions;

       $structureFromDb->save();


       return redirect()->route('exams.show_exam', ['exam' => $exam_id]);


    }

    public function delete_structure($structure)
    {
        $structureFromDb = ExamStructure::find($structure);

        $structureFromDb->delete();
        return redirect()->back();
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
                $question = Question::with('options')->where('id', $test_paper_question->question_id)->first();
                array_push($questions, $question);
            }
        }


        $difficulties = Difficulty::all();

        $question_types = QuestionType::all();
        // dd($question_types);

        $chapters = Chapter::where('subject_id', $subject)->get();


        return view('exams.show', [
            'user' => $user,
            'hasApprovalToSubject' => $hasApprovalToSubject,
            'subject' => $subjectFromDb,
            'exam' => $examFromDb,
            'questions' => $questions,

            'is_dynamic' => $is_dynamic,
            'structures' => $structures,
            'difficulties' => $difficulties,
            'chapters' => $chapters,
            'question_types' => $question_types

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
        // Check if this exam exists
        $exam_key = $request->exam_key;
        $user = session()->get('user');

        $subject = session()->get('subject');
        dd($subject);
        
        $subject = Subject::where('id', $subject);
        
        if($subject == null ){
            return redirect()->back()->with('quizTaken', 'You have taken taken successfully');
        }

        
           

        $exam = Exam::where('exam_key', $exam_key)->first();

        

        if($exam == null){
            return redirect()->back()
            ->with('noSuchExamKey','There is no such exam key. Please, make sure all letters are captical.');
        }


        session()->put('exam', $exam);


        // If the student has taken this exam before, redirect him to his results page

        $taken_exam = TakenExam::where([
            ['exam_key', '=', $exam_key],
            ['student_id', '=', $user->id],
        ])->first();

        if($taken_exam != null){
            return redirect()->route('student_exam', ['exam' => $exam->id]);
        }

        // if he hasn't take it :
        // first check if the exam can be accessed anytime
        $timer = 0;
        // Note: Timer is calculated in minutes
        if($exam->is_accessed_anytime){
            // the exam can be accecced anytime
            $timer = $exam->duration;
        }
        else {
 
            // exam is accessed only in specified date and time
            $start_from = $exam->start_from;
            $start = Carbon::createFromFormat('Y-m-d H:i:s', $start_from);
            list($whole, $decimal) = explode('.', $exam->duration );
            $end = Carbon::createFromFormat('Y-m-d H:i:s', $start_from);
            $end->addMinute($whole);
            $end->addSecond($decimal / 100 * 60);
            // dd($start, $end);
            $now = Carbon::now();
            // dd($now);
            // is this the time when the exam is accecced?
            if($now->gte($start) && $now->lt($end)){
                // dd('دا وقت الامتحان فعلا');
                $interval = $now->diff($end);
                $timer += $interval->h * 60;
                $timer = $interval->i;
                $timer += $interval->s / 60;
            }
            else {
                // dd('دا  مش وقت الامتحان ');
                // is the exam currently accepting responses?
                if($exam->is_accepting_responses){
                    // dd('the exam is currently accepting responses');
                    $timer = 1;
                }
                else {
                    // dd('the exam is not accepting responses currently');
                    return redirect()->back()->with('notAcceptingResponses',
                    'The exam is not accepting responses currently');


                }


            }

        }

        $questions = [];
        if($exam->is_dynamic == true){
            // get stuctures
            $structures = ExamStructure::where('exam_key', $exam_key)->get();

            // get questions of these structures
            foreach($structures as $structure){
                $questions_of_structure = Question::with('options')->where([
                    ['subject_id', '=', $structure->subject_id],
                    ['chapter_id', '=', $structure->chapter_number],
                    ['difficulty', '=', $structure->difficulty],
                    ['question_type', '=', $structure->question_type]
                ])->inRandomOrder()->limit($structure->number_of_questions)->get();

                foreach($questions_of_structure as $question){
                    array_push($questions, $question);
                }
            }
            $questions = array_unique($questions);
            shuffle($questions);
        }
        else {
            // else static -> get questions
            $test_paper_questions = TestPaper::where('exam_key', $exam_key)->inRandomOrder()->get();

            foreach($test_paper_questions as $question_in_test_paper){
                $question = Question::with('options')->where('id', $question_in_test_paper->question_id)->first();
                array_push($questions, $question);
            }
        }
        $total_exam_marks = 0.0;

        $user = session()->get('user');


        foreach($questions as $question){
            $question->options = $question->options->shuffle();
            $total_exam_marks += $question->options->sum('points');
        }
        session()->put('total_exam_marks', $total_exam_marks );


        $quiz_questions_ids = new Collection();
        foreach($questions as $question){
            $quiz_questions_ids->push($question->id);
        }
        session()->put('quiz_questions_ids', $quiz_questions_ids);

        $timer = $timer * 60;


        return view('exams.quiz',
         ['questions' => $questions,
         'exam' => $exam,
         'user' => $user,
         'timer' => $timer]
        );
    }

    public function storeAnswers(Request $request){
        $quiz_questions_ids = session()->get('quiz_questions_ids');
        $questions_not_answered_ids = new Collection();
        $questions_answered_ids = new Collection();


        // options chosen

        $rules = $this->validate($request, array('questions'=>'required'));
        $options = Option::find(array_values($request->input('questions')));


        // total score of the student
        $scored_points = $options->sum('points');


        $examFromDb = session()->get('exam');

        // store in taken exam
        $taken_exam = new TakenExam();
        $taken_exam->exam_key = session()->get('exam')->exam_key;
        $taken_exam->student_id = session()->get('user')->id;
        $taken_exam->exam_id = session()->get('exam')->id;
        $taken_exam->total_score = $scored_points;

        $total_exam_marks = session()->get('total_exam_marks' );
        $taken_exam->marks = $examFromDb->marks;
        
        // calculate marks of the student
        $student_score =
        ($taken_exam->total_score * $examFromDb->marks );
        $student_score = $student_score / $total_exam_marks;
        $student_score = round($student_score, 2);
        $taken_exam->student_score = $student_score;
        $taken_exam->save();


        
        // store student chosen options of the exam in student aswers table
        foreach($options as $option){
            $questions_answered_ids->push($option->question_id);
            $answer = new StudentAnswer();
            $answer->option_id = $option->id;
            $answer->question_id = $option->question_id;
            $answer->student_id = session()->get('user')->id;
            $answer->exam_key = session()->get('exam')->exam_key;
            $answer->save();
        }


        foreach($quiz_questions_ids as $question){
            if(!$questions_answered_ids->contains($question)){
                $questions_not_answered_ids->push($question);
            }
        }
        // dd($questions_not_answered_ids, $questions_answered_ids);

        // Add the questions not answered to student answers
        foreach($questions_not_answered_ids as $question){
            $answer = new StudentAnswer();
            $answer->option_id = -1;
            $answer->question_id = $question;
            $answer->student_id = session()->get('user')->id;
            $answer->exam_key = session()->get('exam')->exam_key;
            $answer->save();
        }


        return redirect()->route('exams.student_exams');
    }


    public function show_results($exam)
    {
        // Show all the students results that have taken this exam
        $user = session()->get('user');
        $hasApprovalToSubject = session()->get('hasApprovalToSubject');
        $subject = session()->get('subject');
        $subjectFromDb = Subject::where('id', $subject)->first();

        $taken_exams=TakenExam::where('exam_id', $exam)->orderBy('student_score', 'DESC')->get();
        $exam=Exam::where('id', $exam)->first();

        return view('exams.show_results')->with([
            'user' => $user,
            'taken_exams'=> $taken_exams,
            'exam'=> $exam,
            'hasApprovalToSubject' =>  $hasApprovalToSubject,
        ]);
    }
}
