@extends('layout')

@section('content_title') Edit Expense @endsection

@section('content')
    <form method="post" action="{{ route('expense_update', ['expense' => $expense]) }}" class="form">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="budget_amount_id">Category</label>
            <select name="budget_amount_id" class="form-control">
                @foreach($budgetAmounts as $amount)
                    <option value="{{ $amount->id }}" @if($expense->budget_amount_id == $amount->id)selected="selected"@endif>{{ $amount->budgetCategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" name="source" class="form-control" value="{{ $expense->source }}">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $expense->amount }}">
        </div>
        <div class="form-group">
            <label for="date_charged">Date Charged</label>
            <input type="text" name="date_charged" class="form-control" autocomplete="off" value="{{ $expense->date_charged }}">
        </div>
        <div class="form-group">
            <label for="date_paid">Date Paid</label>
            <input type="text" name="date_paid" class="form-control" autocomplete="off" value="{{ $expense->date_paid }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

@section('javascripts')
    <script>
        $('[name="date_charged"]').datepicker({ format: 'yyyy-mm-dd' });
        $('[name="date_paid"]').datepicker({ format: 'yyyy-mm-dd' });
    </script>
@endsection
