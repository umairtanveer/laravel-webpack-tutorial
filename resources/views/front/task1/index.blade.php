@extends('layouts.master')

@section('title', "Task 1")

@section('content')
    <h1 class="mt-5">{{ __('Task 1 (Ajax CRUD)') }}</h1>

    <div class="row mt-5">
        <div class="col-md-6">
            <h3>{{ __('Todo List') }}</h3>
        </div>
        <div class="col-md-6">
            <button class="btn btn-info btn-sm float-right" data-toggle="modal"
                    data-target="#createTodoForm">{{ __('Create Todo') }}</button>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>{{ __('ID') }}#</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Author') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody id="task1_table">
        @foreach($todoList as $todo)
            <tr>
                <td>{{ $todo->id }}</td>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->author }}</td>
                <td>{{ $todo->date }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Actions</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:;">View</a>
                            <a class="dropdown-item" href="javascript:;">Edit</a>
                            <a class="dropdown-item" href="javascript:;">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('front.task1.includes._modals')

@endsection
