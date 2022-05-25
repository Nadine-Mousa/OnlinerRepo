<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
// use App\Models\SingleChoiceQuestion;
use App\Models\ProfessorSubject;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Option;
use App\Models\Difficulty;



class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user, $subject)
    {
        $userFromDb = User::findOrFail($user)->first();
        $subjectFromDb = Subject::findOrFail($subject)->first();
        $question_types=QuestionType::all();
        $professor_subject = 
        ProfessorSubject::where([
            ['professor_id', '=', $user],
            ['subject_id', '=', $subject]
        ])->first();
        $hasApprovalToSubject = false;
        if($professor_subject != null){
            $hasApprovalToSubject = true;
        }
        $questions = Question::with('options')->where('subject_id', $subject)->get();
        // $options = Option::all();
        

        
        return view('questions.index', [
         'questions' => $questions,
         'user' => $userFromDb,
         'subject' =>$subjectFromDb,
         'hasApprovalToSubject' => $hasApprovalToSubject,
         'question_types' => $question_types,
        //  'options' => $options,
        ]);
    }
//trashed questions

public function trashed($user, $subject)
    {
        $userFromDb = User::findOrFail($user)->first();
        $subjectFromDb = Subject::findOrFail($subject)->first();
        $user = session()->get('user');
        $subject=session()->get('subject');
        $trashed_questions=Question::onlyTrashed()->where('subject_id', $subject)->get();
        $options = [];
        foreach($trashed_questions as $trashed_question){
            $option = Option::where('question_id', $trashed_question->id)->first();
            array_push($options, $option);
           
        }
        return view('questions.trashed', [
            'trashed_questions' => $trashed_questions,
            'user' => $userFromDb,
            'subject' =>$subjectFromDb,
            'options' => $options,
           ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user, $subject)
    {
        $user = session()->get('user');
       // $user=session()->get('user');
        $subject=session()->get('subject');
        $question_types=QuestionType::all();
        $chapters=Chapter::where('subject_id', $subject)->get();
        $difficulities = Difficulty::all();

       // dd($user);
        return view('questions.create', [
            'user' => $user,
            'subject' =>$subject,
            'question_types' => $question_types,
            'chapters' => $chapters,
            'difficulties' => $difficulities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user, $subject)
    {
        $user=session()->get('user');
        $subject=session()->get('subject');
        $level = session()->get('level');
        $department = session()->get('department');
        $user = session()->get('user');

    $this->validate($request, [
        'question_type' => 'required',
        'title' => 'required',
        'chapter_number' => 'required',
        'difficulty' => 'required',
    ]);

    $question = Question::create([
        'subject_id' => $subject,
        'title' => $request->title,
        'question_type' => $request->question_type,
        'chapter_id' =>  $request->chapter_number,
        'difficulty' =>  $request->difficulty,
    ]);

       $question->save();

       return redirect()->route('questions.show',
        ['user' => $user,
         'subject' => $subject,
         'question' => $question->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $subject, $question)
    {
        
        $user=session()->get('user');
        $subject=session()->get('subject');
        $subjectFromDb = Subject::find($subject);
        $questionFromDb=Question::where('id', $question)->first();
        $options=Option::where('question_id', $questionFromDb->id)->get();
        session()->put('question', $question);

        $professor_subject = ProfessorSubject::where(
            [['professor_id', '=', $user->id],
            ['subject_id', '=', $subject]]
        )->first();

        $hasApprovalToSubject = false;
        if($professor_subject != null){
            $hasApprovalToSubject = true;
        }

        if($user->role == 1){
            $hasApprovalToSubject = true;
        }


       return view('questions.show')->with([
           'question'=> $questionFromDb,
            'options' =>$options,
            'user' => $user,
            'subject' => $subjectFromDb,
            'hasApprovalToSubject' => $hasApprovalToSubject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user, $subject, $question)
    {
        $user=session()->get('user');
        $subject=session()->get('subject');
        // $questionFromDb = Question::find($question);
        $questionFromDb = Question::where('id', $question)->first();

        $question_types=QuestionType::all();
      /// $h= $questionFromDb->question_type->question_name;
        $question_type = $questionFromDb->question_type;
        $question_name = QuestionType::where('id', $question_type)->first()->type_name;
        $chapters=Chapter::where('subject_id', $subject)->get();
        $difficulties = Difficulty::all();


        return view('questions.edit')->with([  
         'user' => $user,
         'subject' =>$subject,
         'question' => $questionFromDb,
         'question_types' => $question_types,
         'question_type' => $question_type,
         'question_name' => $question_name,
         'chapters' => $chapters,
         'difficulties' => $difficulties
        ]); 
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user, $subject, $question)
    {
        $questionFromDb = Question::find($question);
        $user=session()->get('user');
        $subject=session()->get('subject');
        $level = session()->get('level');
        $department = session()->get('department');
       

        $this->validate($request, [
            'question_type' => 'required',
            'title' => 'required',
            'chapter_id' => 'required',
            'difficulty' => 'required',
        ]);

        $question = Question::where('id', $question)
        ->update(
            ['title' =>  $request->title,
            'question_type' => $request->question_type,
            'chapter_id' => $request->chapter_id,
            'difficulty' => $request->difficulty
            ]);

        //  $questionFromDb-> subject_id = $subject;
        //  $questionFromDb->  chapter_id = $request->chapter_id;
        //  $questionFromDb-> title = $request->title;
        //  $questionFromDb-> question_type = $request->question_type;
        //  $questionFromDb-> difficulty = $request->difficulty;
            // $questionFromDb->save();


       return redirect()->route('questions.index', ['user' => $user, 'subject' => $subject, 'question' => $questionFromDb]);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user, $subject, $question)
    {
        $user=session()->get('user');
        $subject=session()->get('subject');

        $questionFromDb = Question::find($question);

        $questionFromDb->delete();

        $options = Option::where('question_id', $question)->get();
        foreach($options as $option){
            $option->delete();
        }
        return redirect()->back();
    }

    //haed delete

    public function hdelete($user, $subject, $question)
    {
        $question=Question::withTrashed('question', $question)->first();
        $question->forceDelete();
       
        $options = Option::where('question_id', $question)->get();
        foreach($options as $option){
            $option->forceDelete();
        }

        return redirect()->back();

    }

     //restore function

     public function restore($user, $subject, $question)
     {
         $question=Question::withTrashed('question', $question)->first();
        //  $options = Option::withTrashed('question_id', $question)->get();
        //  foreach($options as $option){
        //     $option->restore();
        //  }
        
         $question->restore();
         return redirect()->back();
     }
     public function Question_delete($question)
{
$questionType=QuestionType::where('question_id',$question)->select();
$options=Option::where()->select();


if($options!=null){
    $options->delete();
    foreach ($options as $option){
        $option->delete();
    }
}
    $questionObj = QuestionType::find($question);
    if($questionObj!=null){
        $questionObj->delete();
    }

    return redirect()->back();
}


}

