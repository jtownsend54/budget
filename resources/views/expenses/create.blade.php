@extends('layout')

@section('content_title') Create Expense @endsection

@section('content')
    <form method="post" action="{{ route('expense_store') }}" class="form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="budget_amount_id">Category</label>
            <select name="budget_amount_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($budgetCategory->id == $category->id)selected="selected"@endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" name="source" class="form-control">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control">
        </div>
        <div class="form-group">
            <label for="date_charged">Date Charged</label>
            <input type="text" name="date_charged" class="form-control">
        </div>
        <div class="form-group">
            <label for="date_paid">Date Paid</label>
            <input type="text" name="date_paid" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection