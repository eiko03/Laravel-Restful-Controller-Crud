@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">
                    {{$qu->title}}
                    </div>
                    <div class="card-body">
                        <a class="btn btn-dark" href="/quesner/{{$qu->id}}/question/create"> Add Question</a>
                        <a class="btn btn-dark" href="/surveys/{{$qu->id}}-{{Str::slug($qu->title)}}"> Take Survey</a>
                    </div>
                    </div>

                @foreach($qu->question as $key=>$ques)
                    <div class="card">
                        <div class="card-header">
                            <strong>{{$key+1}}</strong>
                            {{$ques->question}}
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($ques->answer as $ans)
                                   <div>
                                       <li class="list-group-item d-flex justify-content-between">{{$ans->answer}}
                                           @if($ques->responses->count())
                                            <small>{{round(($ans->responses->count()*100)/$ques->responses->count(),2)}} % </small>
                                           @endif
                                       </li>
                                   </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form method="post" action="/quesner/{{$qu->id}}/question/{{$ques->id}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Delete Questions
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
