<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\SingleChoiceQuestion;
use App\Models\ProfessorSubject;

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
        $professor_subject = 
        ProfessorSubject::where([
            ['professor_id', '=', $user],
            ['subject_id', '=', $subject]
        ])->first();
        $hasApprovalToSubject = false;
        if($professor_subject != null){
            $hasApprovalToSubject = true;
        }
        $questions = SingleChoiceQuestion::where('subject_id', $subject)->get();
        return view('questions.index', [
         'questions' => $questions,
         'user' => $userFromDb,
         'subject' =>$subjectFromDb,
         'hasApprovalToSubject' => $hasApprovalToSubject
        ]);
    }
//trashed questions

public function trashed($user, $subject)
    {
        $user = session()->get('user');
        $subject=session()->get('subject');
        $trashed_questions=SingleChoiceQuestion::onlyTrashed()->where('subject_id', $subject)->get();

        return view('questions.trashed', [
            'trashed_questions' => $trashed_questions,
            'user' => $user,
            'subject' =>$subject,
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


       // dd($user);
        return view('questions.create', [
            'user' => $user,
         'subject' =>$subject,
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
        //$subject = session()->get('subject');
        $level = session()->get('level');
        $department = session()->get('department');
       // dd($department, $level);
       // $user = session()->get('user');
       $this->validate($request, [
           'title' => 'required',
           'id' => 'required',
           'chapter_number' => 'required',
           'question_type' => 'required',
           'difficulty' => 'required',
           'option_one' => 'required',
           'option_two' => 'required',
           'option_three' => 'required',
           'option_four' => 'required',
           'answer' => 'required',
           'marks' => 'required',
       ]);

       $question = SingleChoiceQuestion::create([
           'depart_id' => $department,
           'level_id' => $level,
           'subject_id' => $subject,
           'chapter_number' => $request->chapter_number,
           'title' => $request->title,
           'id' => $request->id,
           'question_type' => $request->question_type,
           'difficulty' => $request->difficulty,
           'option_one' => $request->option_one,
           'option_two' => $request->option_two,
           'option_three' => $request->option_three,
           'option_four' => $request->option_four,
           'answer' => $request->answer,
           'marks' => $request->marks,
       ]);

       $question->save();
       return redirect()->route('questions.index', ['user' => $user, 'subject' => $subject]);
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
    public function edit($user, $subject, $question)
    {
        $user=session()->get('user');
        $subject=session()->get('subject');
        $questionFromDb = SingleChoiceQuestion::find($question);

        return view('questions.edit')->with([  
            'user' => $user,
         'subject' =>$subject,
         'question' => $questionFromDb
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
        $questionFromDb = SingleChoiceQuestion::find($question);
        $user=session()->get('user');
        $subject=session()->get('subject');
       
        $level = session()->get('level');
        $department = session()->get('department');
       
       $this->validate($request, [
           'title' => 'required',
           'id' => 'required',
           'chapter_number' => 'required',
           'question_type' => 'required',
           'difficulty' => 'required',
           'option_one' => 'required',
           'option_two' => 'required',
           'option_three' => 'required',
           'option_four' => 'required',
           'answer' => 'required',
           'marks' => 'required',
       ]);

       
       $questionFromDb-> depart_id = $department;
       $questionFromDb-> level_id = $level;
       $questionFromDb-> subject_id = $subject;
       $questionFromDb->  chapter_number = $request->chapter_number;
       $questionFromDb-> title = $request->title;
       $questionFromDb-> id = $request->id;
       $questionFromDb-> question_type = $request->question_type;
       $questionFromDb-> difficulty = $request->difficulty;
       $questionFromDb-> option_one = $request->option_one;
       $questionFromDb-> option_two = $request->option_two;
       $questionFromDb-> option_three = $request->option_three;
       $questionFromDb-> option_four = $request->option_four;
       $questionFromDb-> answer = $request->answer;
       $questionFromDb-> marks = $request->marks;
       

       $questionFromDb->save();
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
        $questionFromDb = SingleChoiceQuestion::find($question);
        $questionFromDb->delete();
        return redirect()->back();
    }

    //haed delete

    public function hdelete($user, $subject, $question)
    {
        $question=SingleChoiceQuestion::withTrashed('question', $question)->first();
        $question->forceDelete();
       
        return redirect()->back();

    }

     //restore function

     public function restore($user, $subject, $question)
     {
         $question=SingleChoiceQuestion::withTrashed('question', $question)->first();
       
         $question->restore();
         return redirect()->back();
     }
}

