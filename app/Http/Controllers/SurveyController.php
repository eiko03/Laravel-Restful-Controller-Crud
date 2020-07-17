<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(\App\Quesner $qu,$slug){
        //dd($quesner);
        $qu->load('question.answer');
        return view('survey.show',compact('qu'));

    }
    public function store(\App\Quesner $qu){
        //dd(request()->all());
        $data= request()->validate([
            'responses.*.answer_id'=> 'required',
            'responses.*.question_id'=> 'required',
            'survey.name'=>'required',
            'survey.email'=>'required|email',

        ]);
        $survey = $qu->survey()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);
        return 'Thank You';
    }
}
