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
                <h5 class="card-title">${{ number_format($budget->bank_start - $previousAmount, 2) }}</h5>
                <p class="card-text">Unallocated</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Left to be budgeted</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
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
    @parent
@endsection