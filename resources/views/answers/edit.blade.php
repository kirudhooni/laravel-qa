@extends('layouts.app')

@section('content')
<div class="container">

<div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                    <h1> Edit Answer for question: <strong> {{ $question->title }}</strong></h1>
                    </div>
                    <hr>
                <form action="{{ route('questions.answers.update', [$question->id, $answer->id] )}}" method="post">
                       @csrf
                       @method('PATCH')
                       <div class="form-group">
                       <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" name="body" id="" cols="30" rows="7">{{ old('body', $answer->body)}}</textarea>
                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('body')}}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                               <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                           </div>
                       </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    @endsection
    