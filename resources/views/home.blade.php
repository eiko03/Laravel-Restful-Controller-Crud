@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Portal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <strong> my Questioner</strong><br>
                        <ul class="list-group">
                        @foreach($qu as $que)
                            <li class="list-group-item">
                                <a href="/quesner/{{$que->id}}">
                                    {{$que->title}}
                                </a><br>
                                <small><a href="/surveys/{{$que->id}}-{{\Illuminate\Support\Str::slug($que->title)}}"> Survey</a> </small>
                            </li>

                            @endforeach
                        </ul>
                    <div class="container"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
