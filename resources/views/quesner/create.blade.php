@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Questionner</div>

                    <div class="card-body">
                        <form method="post" action="/quesner">
                            @csrf
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
                                <small id="titleHelp" class="form-text text-muted">Give Title.</small>
                                @error('title') <small class="text-danger"> {{$message}} </small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="Purpose">Purpose</label>
                                <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="emailHelp" placeholder="Enter Purpose">
                                <small id="purposeHelp" class="form-text text-muted">Give Purpose.</small>
                                @error('purpose') <small class="text-danger"> {{$message}} </small> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
