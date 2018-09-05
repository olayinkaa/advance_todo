@extends('layouts.master')
@section('content')
      <div class="container">
      <form action="{{route('logout')}}" method="POST">
            @csrf
            <p>Logged as <b>{{Auth::user()->name}}</b> <button type="submit" class="btn waves-effect waves-light">Logout</button></p>        
      </form>
      @isAdmin
        <div> 
                <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">person_add</i>
                                <strong>Invitation</strong>
                                <span class="new badge">6</span>
                            </div>
                            <div class="collapsible-body">
                                <p>
                                    <span class="teal-text"><strong>David Jones</strong> </span>
                                    <a href="#" class="btn blue ">Accept</a>
                                    <a href="#" class="btn red">Deny</a>
                                </p>
                                <p>
                                    <span class="teal-text"><strong>Oluchi Jannet</strong> </span>
                                    <a href="#" class="btn blue ">Accept</a>
                                    <a href="#" class="btn red">Deny</a>
                                </p>
                                <p>
                                    <span class="teal-text"><strong>Daniel Mediz</strong> </span>
                                    <a href="#" class="btn blue ">Accept</a>
                                    <a href="#" class="btn red">Deny</a>
                                 </p>
                            </div>
                        </li>
                 </ul>
        </div>
    @endisAdmin

        <h2 class="center teal-text text-darken-4">TO DO</h2>
        
      <table>
            <thead>
              <tr>
                  <th>Tasks</th>
                  @isAdmin
                  <th>Assigned to</th>
                  @endisAdmin
                  <th>Edit</th>
                  <th>Delete</th>                  
              </tr>
            </thead>
    
            <tbody>
            @foreach($tasks as $task)
              <tr>
                    <td><a href="#">
                    @if(!$task->status)
                        {{$task->content}}
                    @else
                    <strike class="red-text">
                        {{$task->content}}
                    </strike>
                    @endif
                    </a></td>
                    @isAdmin
                    <td>{{$task->user->name}}</td>
                    @endisAdmin
                    <td><a href="#" title="edit"><i class="small material-icons">edit</i></a></td>
                    <td><a href="#" title="delete"><i class="small material-icons">delete_forever</i></a></td>                
              </tr>
           @endforeach
           
            </tbody>
          </table>
              
          <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
        <form action="{{route('todo.store')}}" method="POST" class="col s12">
               @csrf
                <div class="row">
                        <div class="input-field col s12">
                            <input name="task" type="text" class="validate">
                            <label for="task">New Task</label>
                        </div>
                </div>

                <!-- <div class="input-field col s12">
                        <select>
                          <option value="" disabled selected>Assigned to:</option>
                          <option value="1">To myself</option>
                          <option value="2">Fuller kind</option>
                          <option value="3">liviet leaf</option>
                        </select>
                        <label>Assign Task</label>
                </div> -->
              
              <button type="submit" class="btn waves-effect waves-light">Add new task</button> 
        </form>

        <div class="section"></div>
        <div class="section"></div>
        @isWorker
        <form action="" method="POST" class="col s12">
                <div class="input-field">
                        <select>
                          <option value="" disabled selected>Send Invitation to:</option>
                          <option value="1">To myself</option>
                          <option value="2">Fuller kind</option>
                          <option value="3">liviet leaf</option>
                        </select>
                        <label>Send Invitation</label>
                </div>
              
              <a  class="btn waves-effect waves-light">Send Invitation</a> 
        </form>
        @endisWorker
        <div class="section"></div>
        @isAdmin
        <ul class="collection with-header">
                <li class="collection-header"><h4>My coworkers</h4></li>
                <li class="collection-item"><div>Danie Mediz<a href="#!" class="secondary-content"><i class="material-icons red-text">delete_forever</i></a></div></li>
                <li class="collection-item"><div>Oluchi Jannet<a href="#!" class="secondary-content"><i class="material-icons red-text">delete_forever</i></a></div></li>
                <li class="collection-item"><div>Opeyemi banky<a href="#!" class="secondary-content"><i class="material-icons red-text">delete_forever</i></a></div></li>
        </ul>
        @endisAdmin
        <div class="section"></div>
        <div class="section"></div>






    </div>



@stop