@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{$qu->title}}</h1>
                <form method="post" action="/surveys/{{$qu->id}}{{Str::slug($qu->title)}}">
                    @csrf
                    @foreach($qu->question as $key=>$question)
                        <div class="card">
                            <div class="card-header">
                                <strong>
                                    {{$key+1}}
                                </strong>
                                {{$question->question}}
                            </div>
                            <div class="card-body">
                                @error('responses.'.$key.'.answer_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                <ul class="list-group">
                                    @foreach($question->answer as $ans)
                                       <label for="answer {{$ans->id}}">
                                           <li class="list-group-item">
                                            <input type="radio" name="responses[{{$key}}][answer_id]"
                                                   {{(old('responses.'.$key.'.answer_id')==$ans->id)?'checked':''}}
                                                   id="answer {{$ans->id}}" value="{{$ans->id}}" class="mr-2">
                                            {{$ans->answer}}
                                               <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                            </li>
                                       </label>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    @endforeach
                    <div class="card">
                        <div class="card-header">
                            <strong> Your Information</strong>
                        </div>
                        <div class="card-body">



                            <div class="form-group">
                                <label for="Name">Your Name</label>
                                <input type="text" name="survey[name]" class="form-control" id="Name" aria-describedby="nameHelp" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Whats Your name?</small>
                                @error('purpose') <small class="text-danger"> {{$message}} </small> @enderror
                            </div>


                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" name="survey[email]" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                <small id="emailHelp" class="form-text text-muted">Give Email.</small>
                                @error('purpose') <small class="text-danger"> {{$message}} </small> @enderror
                            </div>

                        </div>

                    </div>

                    <button class="btn btn-dark mt-4" type="submit">
                        Complete Survey
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection
