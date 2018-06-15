@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Lista Task-uri</h1>
                    @if(count($tasks))
                    <table class="table table-striped">
                        <tr>
                            <th>Task</th>
                            <th></th>

                        </tr>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td></td>
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
