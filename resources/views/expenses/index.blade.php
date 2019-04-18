@extends('layout')

@section('content_title') Expenses @endsection

@section('content')
    <div id="accordion">
        @foreach($budgetAmounts as $budgetAmount)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $budgetAmount->id }}" aria-expanded="true" aria-controls="collapse{{ $budgetAmount->id }}">
                            {{ $budgetAmount->budgetCategory->name }}
                        </button>
                        <a href="{{ route('expense_create', ['budget_amount' => $budgetAmount]) }}" class="btn btn-primary btn-sm float-right">New</a>
                    </h5>
                </div>

                <div id="collapse{{ $budgetAmount->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th>Date</th>
                                <th>Source</th>
                                <th>Cost</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            @foreach(\App\Expense::ofCategory($budget, $budgetAmount->budget_category_id)->get()->sortBy('date_paid') as $expense)
                                <tr>
                                    <td>{{ $expense->date_paid->toFormattedDateString() }}</td>
                                    <td>{{ $expense->source }}</td>
                                    <td class="text-right">{{ number_format($expense->amount, 2) }}</td>
                                    <td><a href="{{ route('expense_show', ['expense' => $expense]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection