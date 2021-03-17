@extends('layouts.master')

@section('title', "Task 1")

@section('content')
    <h1 class="mt-5">{{ __('Task 1 (Ajax CRUD)') }}</h1>

    <div class="row mt-5">
        <div class="col-md-6">
            <h3>{{ __('Todo List') }}</h3>
        </div>
        <div class="col-md-6">
            <button class="btn btn-info float-right" data-toggle="modal"
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
                            <a class="dropdown-item view_todo" href="javascript:;" data-row="{{ json_encode($todo) }}">View</a>
                            <a class="dropdown-item edit_todo" href="javascript:;" data-row="{{ json_encode($todo) }}">Edit</a>
                            <a class="dropdown-item delete_todo" href="javascript:;"
                               data-id="{{ $todo->id }}">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('front.task1.includes._modals')

@endsection

@section('scripts')
    <script src="{{ asset('js/front/task1/todo.js') }}"></script>
@endsection
