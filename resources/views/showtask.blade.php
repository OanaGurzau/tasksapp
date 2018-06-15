@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$task->name}}<a href="/tasks" class="float-right btn btn-dark">Inapoi</a></div>

                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item">Nume Task: {{$task->name}}</li>
                    <li class="list-group-item">Descriere: {{$task->description}}</li>
                  </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
