@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editeaza Task <a href="/home" class="float-right btn btn-dark">Inapoi</a></span></div>

                <div class="card-body">
                  {!!Form::open(['action' => ['TasksController@update', $task->id], 'method' => 'POST'])!!}
                    {{Form::bsText('name', $task->name , ['placeholder' => 'Nume Task'])}}
                    {{Form::bsTextArea('description', $task->description, ['placeholder' => 'Descriere Task'])}}
                    {{Form::hidden('_method', "PUT")}}
                    {{Form::bsSubmit('Editeaza Task', ['placeholder' => 'Editeaza Task'])}}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
