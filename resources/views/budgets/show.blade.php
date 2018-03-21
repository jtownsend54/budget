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
        <div class="form-group text-right">
            <strong>
                Available: $<span class="available">{{ $budget->incomes->sum('amount') }}</span>
            </strong>
        </div>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Category</th>
                <th>From Last Month</th>
                <th>Adjustment</th>
                <th>Added to this Month</th>
            </tr>
            </thead>
            @foreach($budget->budgetAmounts as $budgetAmount)
                <tr>
                    <td>{{ $budgetAmount->budgetCategory->name }}</td>
                    <td></td>
                    <td><input type="text" class="form-control" name="budget_amounts[{{$budgetAmount->getKey()}}][adjustment]" value="{{$budgetAmount->adjustment}}"/></td>
                    <td><input type="text" class="form-control added" name="budget_amounts[{{$budgetAmount->getKey()}}][added_to_this_month]" value="{{$budgetAmount->added_to_this_month}}"/></td>
                </tr>
            @endforeach
        </table>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

@section('javascripts')
    <script>
        var $available,
            initialAmount,
            addedToThisMonth;

        $(function() {
            $available = $('.available');
            initialAmount = $available.text();

            // Whenever a cursor leaves an added field, update the remaining total
            $('.added').on('blur', function() {
                $available.text(initialAmount - getTotalAdded());
            });
        });

        function getTotalAdded() {
            addedToThisMonth = 0;

            $('.added').each(function(i, ele) {
                addedToThisMonth += $(ele).val();
            });

            return addedToThisMonth;
        }
    </script>
@endsection