<div>

    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif



    <h5 class="card-title">( <label style="color: red">{{$questionsCount}}</label>  ,  <label style="color: green">{{$counter+1}}</label> )   :   {{$data[$counter]->Title}}</h5>

    @foreach(preg_split('/(-)/',$data[$counter]->Answers) as $index=>$answer)

        <div class="custom-control custom-radio">

            <input type="radio" id="CustomRadio{{$index}}" wire:model="CustomRadio"  class="custom-control-input" >

            <label class="custom-control-label" for="CustomRadio{{$index}}" wire:click="nextQuestion({{$data[$counter]->id}} , {{$data[$counter]->Score}} , '{{$answer}}' ,'{{$data[$counter]->Right_answer}}')">{{$answer}}</label>

        </div>

    @endforeach

</div>




