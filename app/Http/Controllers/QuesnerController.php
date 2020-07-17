<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Quesner;

class QuesnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('quesner.create');

    }
    public function store(){
        $data=request()->validate([
            'title'=>'required',
            'purpose'=>'required'
        ]);
        //$data['user_id']= auth()->user()->id;
        //$qu= Quesner::create($data);
        $qu =auth()->user()->quesner()->create($data);
        //dd($qu->toArray());
       return redirect('/quesner/'.$qu->id);
    }
    public function show(\App\Quesner $qu){
        //dd($qu->toArray());
        $qu -> load('question.answer.responses');
        return view('quesner.show',compact('qu'));

    }
    public function home(){
        $qu =auth()->user()->quesner;
        //dd($qu);
        return view('home',compact('qu'));
    }
}
