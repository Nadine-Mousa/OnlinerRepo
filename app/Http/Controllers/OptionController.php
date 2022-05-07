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
       // dd($question);
      
        $this->validate($request, [
          // 'question_id' => 'required',
            'body' => 'required',
            'is_correct' => 'required',
      
            //'points' => 'required',
        ]);
        $option = Option::create([
            'question_id' => $question,
            'body' => $request->body,
            'is_correct' =>  $request->is_correct,
          
            'points' =>  $request->points,
        ]);
     
           $option->save();
           return redirect()->back();
       
    
    }
}
