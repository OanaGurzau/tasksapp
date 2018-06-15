@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Task<a href="/home" class="float-right btn btn-dark">Inapoi</a></div>

                <div class="card-body">
                  {!!Form::open(['action' => 'TasksController@store', 'method' => 'POST'])!!}
                    {{Form::bsText('name', '', ['placeholder' => 'Nume Task'])}}
                    {{Form::bsTextArea('description', '', ['placeholder' => 'Descriere Task'])}}
                    {{Form::bsSubmit('Creaza Task Nou', ['placeholder' => 'Creeaza Task Nou'])}}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
