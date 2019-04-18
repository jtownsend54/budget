@extends('layout')

@section('content')
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">${{ $budget->bank_start }}</h5>
                <p class="card-text">Savings on 1st</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">${{ number_format($budget->bank_start - $previousAmount - $budget->budgetAmounts->sum('adjustment'), 2) }}</h5>
                <p class="card-text">Unallocated</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">${{ number_format($budget->projected_income - $budget->budgetAmounts->sum('added_to_this_month'), 2) }}</h5>
                <p class="card-text">Left to be budgeted</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">${{ $budget->bank_start - $budget->getTotalExpenses() + $budget->incomes->sum('amount') }}</h5>
                <p class="card-text">Real Time</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">${{ $budget->getTotalExpenses() }}</h5>
                <p class="card-text">Spent</p>
            </div>
        </div>
    </div>
    <br>
    <div class="col-12">
        <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1576" height="300" style="display: block; height: 332px; width: 788px;"></canvas>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Budget</th>
                            <th class="text-right">{{ $budget->start->format('n/j') }}</th>
                            <th class="text-right">Added</th>
                            <th class="text-right">Spent</th>
                            <th class="text-right">{{ $budget->end->format('n/j') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($budget->budgetAmounts as $budgetAmount)
                            <tr>
                                <td>{{ $budgetAmount->budgetCategory->name }}</td>
                                <td class="text-right">${{ number_format($budgetAmount->getTotal() + $budgetAmount->expenses->sum('amount') - $budgetAmount->added_to_this_month, 2) }}</td>
                                <td class="text-right">${{ $budgetAmount->added_to_this_month ?? 0 }}</td>
                                <td class="text-right">${{ $budgetAmount->expenses->sum('amount') }}</td>
                                <td class="text-right">${{ number_format($budgetAmount->getTotal(), 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @parent
@endsection

@section('javascripts')
    @parent
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["{!! implode('","', \App\Budget::all()->pluck('name')->all()) !!}"],
                datasets: [{
                    data: [{{ implode(',', \App\Budget::all()->pluck('bank_start')->all()) }}],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'First of the Month'
                },
                hover: {
                    mode: 'nearest'
                },
                legend: {
                    display: false
                }
            }
        });
    </script>
@endsection