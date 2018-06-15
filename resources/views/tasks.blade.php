@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ultimele task-uri adaugate</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($tasks))
                      <ul class="list-group">
                        @foreach($tasks as $task)
                          <li class="list-group-item"><a href="/tasks/{{$task->id}}">{{$task->name}}</a></li>
                        @endforeach
                    </ul>
                    @else
                    <p> Nu exista niciun tas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
