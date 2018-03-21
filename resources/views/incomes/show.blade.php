@extends('layout')

@section('content_title') Edit Income @endsection

@section('content')
    <form method="post" action="{{ route('income_update', ['income' => $income]) }}" class="form">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="budget_id">Budget</label>
            <select name="budget_id" class="form-control">
                @foreach($budgets as $budget)
                    <option value="{{ $budget->id }}" @if($budget->id == $income->budget_id)selected="selected"@endif>{{ $budget->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $income->amount }}">
        </div>
        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" name="source" class="form-control" value="{{ $income->source }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection