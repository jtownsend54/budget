@extends('layout')

@section('content_title') Edit Budget @endsection

@section('content')
    <form method="post" action="{{ route('budget_update', ['budget' => $budget]) }}" class="form">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $budget->name }}">
        </div>
        <div class="form-group">
            <label for="start">Start</label>
            <input type="text" name="start" class="form-control" value="{{ $budget->start }}">
        </div>
        <div class="form-group">
            <label for="end">End</label>
            <input type="text" name="end" class="form-control" value="{{ $budget->end }}">
        </div>
        <div class="form-group">
            <label for="bank_start">Amount in bank on the 1st</label>
            <input type="text" name="bank_start" class="form-control" value="{{ $budget->bank_start }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection