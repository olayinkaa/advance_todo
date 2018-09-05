@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col s8 offset-s1 "> 

            <form action="{{route('todo.update',$task->id)}}" method="POST" class="col s12">   
                @csrf
                {{method_field('')}}
                <div class="row">
                    <div class="input-field col s12">
                        <input name="task" value="{{$task->content}}" type="text" class="validate">
                        <label for="edit">Edit Task</label>
                    </div>
                </div>
                <button type="submit" class="btn waves-effect waves-light">Edit task</button> 
            </form>

        </div>
    </div>
</div>

@stop