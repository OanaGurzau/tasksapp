@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bun Venit! <span class="float-right"><a href="/tasks/create" class="btn btn-success">Creaza un task nou</a></span></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Lista Task-uri</h1>
                    @if(count($tasks))
                    <table class="table table-bordered">
                        <tr>
                            <th>Task*</th>
                            <th>Descriere Task</th>

                        </tr>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td>{{$task->description}}</td>
                                <td><a class="float-right btn btn-info" href="/tasks/{{$task->id}}/edit">Edit</a></td>
                                <td>{!!Form::open(['action' => ['TasksController@destroy', $task->id],  'method' => 'POST', 'class' => 'float-left', 'onsubmit' => 'return confirm("Stergeti task-ul definitv?")'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::bsSubmit('Sterge', ['class' => 'btn btn-danger'] )}}
                                {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
