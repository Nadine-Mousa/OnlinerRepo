<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionType;
class OptionController extends Controller
{
    public function create($user, $subject, $question)
    {
        $questionFromDb = Question::find($question);
       // session()->put('question', );
        //dd($questionFromDb->id);
        $user = session()->get('user');
        // $user=session()->get('user');
         $subject=session()->get('subject');
         $question=session()->get('question');
         $question_types=QuestionType::all();
 
        // dd($user);
         return view('options.create', [
             'user' => $user,
          'subject' =>$subject,
          'question' => $questionFromDb,
          'question_types' => $question_types
         ]);
    }

    public function store(Request $request,$user, $subject, $question)
    {
        $user=session()->get('user');
        $subject=session()->get('subject');
        $questionFromDb = Question::find($question);
        $question=session()->get('question');
      
        $this->validate($request, [
            'body' => 'required',
            'is_correct' => 'required',
        ]);

        if($request->is_correct == "yes"){
            $this->validate($request, [
                'points' => 'required'
            ]);
        }

        // dd( $request->is_correct, $request->body);

        $option = new Option();
        $option->question_id = $question;
        $option->body = $request->body;
        if ($request->is_correct == "yes"){
            $option->is_correct =  true;
            $option->points = $request->points;
            // update the question marks
            $question = Question::where('id', $questionFromDb->id)
            ->update(['marks' => ($questionFromDb->marks + $request->points) ]);
        }
        else {
            $option->is_correct = false;
            $option->points = 0;
        }
        

        $option->save();
        $options=Option::where('question_id', $questionFromDb->id)->get();


        return redirect()->route('questions.show',
         [
            'user' => $user,
            'question' => $questionFromDb,
            'subject' => $subject
        ]);
    }
}
