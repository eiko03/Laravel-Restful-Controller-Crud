<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(\App\Quesner $questionner){
        return view('question.create',compact('questionner'));

    }
    public function store(\App\Quesner $questionner){
        //dd(request()->all());
        $data = request()->validate([
            'question.question'=>'required',
            'answers.*.answer'=>'required',
        ]);
        $question= $questionner->question()->create($data['question']);
        $question->answer()->createMany($data['answers']);
        return redirect('/quesner/'.$questionner->id);
    }
    public function destroy(\App\Quesner $questionner,\App\Question $question){
        //dd($question);
        $question->answer()->delete();
        $question->delete();
        return redirect($questionner->path());

    }
}
