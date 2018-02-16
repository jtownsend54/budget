@extends('layout')

@section('content_title') Expenses @endsection

@section('content')
    <div id="accordion">
        @foreach($categories as $category)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $category->id }}" aria-expanded="true" aria-controls="collapse{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                        <a href="{{ route('expense_create', ['budget_category' => $category]) }}" class="btn btn-primary btn-sm float-right">New</a>
                    </h5>
                </div>

                <div id="collapse{{ $category->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
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
                            @foreach(\App\Expense::ofCategory($category->id)->get() as $expense)
                                <tr>
                                    <td>{{ $expense->created_at->toFormattedDateString() }}</td>
                                    <td>{{ $expense->source }}</td>
                                    <td>{{ $expense->amount }}</td>
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