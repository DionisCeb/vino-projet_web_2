@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Welcome to Todo List App</h1>
                </div>
                <div class="card-body">
                    <p class="lead">This is a simple todo list application built with Laravel and Bootstrap.</p>
                    <p>Get started by creating your first task!</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('task.index') }}" class="btn btn-primary">Go to Todo List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection