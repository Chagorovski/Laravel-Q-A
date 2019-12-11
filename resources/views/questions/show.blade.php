@extends('template')

@section('content')
    <div class="container mb-5">
        <h1>{{ $question->title }}</h1>
        <p>{{ $question->description }}</p>
        <p>
            Submitted By: {{ $question->user->name }}, {{ $question->created_at->diffForHumans() }}
        </p>
        {{-- when user is authenticated can edit/delete --}}
        @if($question->user->id === Auth::user()->id)
           <p>
               <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary">Edit Question</a>
            </p>
            <form action="{{ route('delete', $question->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" >Delete </button>
            </form>
        @else 
       
        @endif 
        <hr>
        <!-- display all of the answers for this question -->
        @if($question->answers->count() > 0)
            @foreach ($question->answers as $answer)
                <div class="container">
                    <div class="panel panel-default">
                        <div class="panel-body jumbotron jumbotron-fluid pl-4 m-5">
                            <p class="lead">{{ $answer->content }}</p>
                            <h6>Answered By {{ $answer->user->name }}, {{ $answer->created_at->diffForHumans() }}</h6>
                            <br>
                            <br>
                            @if($answer->user_id === Auth::user()->id)
                                <p>
                                    <a href="{{ route('answers.edit', $answer->id) }}" class="btn btn-primary">Edit Answer</a>
                                </p>
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        @else
            <p>
                There are no answers for this question yet. Please consider submitting one below!
            </p>
        @endif
        <!-- display the form, to submit a new answer -->
        <form action="{{ route('answers.store') }}" method="POST">
            @csrf
            <h4>Submit Your Own Answer:</h4>
            <textarea class="form-control" name="content" rows="4"></textarea>
            <input type="hidden" value="{{ $question->id }}" name="question_id">
            <br>
            <button type="submit" class="btn btn-primary">Submit Answer</button>
        </form>
    </div>
@endsection