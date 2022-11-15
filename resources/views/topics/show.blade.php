@extends('layouts.app')

@section('content')
    <div class="container">
        @if($topic)
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row" id="first_title">
                <div class="col-md-12">
                    <h1>{{$topic->title}}</h1>
                    <button class="btn btn-success mt-3" onClick="return start_quiz();">Start Quiz</button>
                  
                </div>
            </div>
            <div class="row" id="quiz_div" style="display:none;">
                <div class="col-md-12">
                    <h1>{{$topic->title}} <span style="text-align:right;font-weight:bold;" id="timer"></span> seconds</h1>
                   
                    <form id="quiz_result" action="{{route('results.store')}}" method="post">
                        @csrf
                        <div>
                            <input type="hidden" name="topic_id" value="{{$topic->id}}">
                            @foreach($topic->questions as $question )
                                <div class="question" data-questionId="{{$question->id}}">
                                    {{$question->question_text}}
                                   
                                    @foreach($question->options as $option)
                                    <div class="answer">  
                                        <input type="checkbox" name="option[{{$question->id}}][{{$option->id}}]"
                                                   value="{{$option->correct}}">
                                            {{$option->option}}
                                           
                                    </div>
                                    @endforeach
                                   <input type="hidden" id="question_id" name="question_id[]" value="{{$question->id}}">
                                </div>
                            @endforeach
                        </div>
                        <a id="submitQuiz" href="{{route('results.show', $topic->id)}}"><input type="submit" value="Submit"
                                                                               class="btn btn-success mt-3"></a>
                    </form>
                </div>
            </div>
        @else
            <h1>No Topic</h1>
        @endif
    </div>
@endsection
@section('script')
<script>
    var count = "{{$topic->quiz_time}}";
    document.getElementById('timer').innerHTML=count;
    var element1 = document.getElementById('first_title');
    var element2 = document.getElementById('quiz_div');
   
   // document.getElementByClass('question').style.display = 'none';
   
    function start_quiz(){

        element1.style.display = 'none';
        element2.style.display = 'block';
       
        var interval = setInterval(function(){
        count--;
        document.getElementById('timer').innerHTML=count;
       
        if (count == 0){
            clearInterval(interval);
            document.getElementById('timer').innerHTML=0;
            alert("You're out of time!");
            document.getElementById('quiz_result').submit();
         }
        }, 1000);
    }

</script>
@endsection