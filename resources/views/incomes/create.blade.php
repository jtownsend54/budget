@extends('layout')

@section('content_title') Add Income @endsection

@section('content')
    <form method="post" action="{{ route('income_store') }}" class="form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="budget_id">Budget</label>
            <select name="budget_id" class="form-control">
                @foreach($budgets as $budget)
                    <option value="{{ $budget->id }}">{{ $budget->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control">
        </div>
        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" name="source" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection