@extends('template')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}'s Profile</h1>
        <p>
            See what {{ $user->name }} has been up to on Laravel Answers.
        </p>
        <hr>
        <div class="row">
            <div class="col-md-6">
        
                @foreach ($user->questions as $question)
                    <div class="jumbotron pb-4">
                        <h4>{{ $question->title }}</h4>
                        <p>
                            {{ $question->description }}
                        </p>
                    </div>
                    <div class="panel-footer pb-3">
                        <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary">View Question</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection