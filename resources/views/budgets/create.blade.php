@extends('layout')

@section('content_title') Create Budget @endsection

@section('content')
    <form method="post" action="{{ route('budget_store') }}" class="form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="start">Start</label>
            <input type="text" name="start" class="form-control">
        </div>
        <div class="form-group">
            <label for="end">End</label>
            <input type="text" name="end" class="form-control">
        </div>
        <div class="form-group">
            <label for="bank_start">Amount in bank on the 1st</label>
            <input type="text" name="bank_start" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection