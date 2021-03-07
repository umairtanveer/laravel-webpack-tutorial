@extends('layouts.master')

@section('title', "Landing Page")

@section('content')
    <h1 class="mt-5">Lecture 2 (Ajax CRUD)</h1>
    <a href="{{ route('task1.ajax.crud') }}">Task Page (Ajax Crud)</a>
@endsection
