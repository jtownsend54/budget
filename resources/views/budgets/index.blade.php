@extends('layout')

@section('content_title') Budgets @endsection

@section('content')
    <a href="{{ route('budget_create') }}" class="btn btn-primary">New</a>
    <br><br>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Budget Period</th>
                <th>Start</th>
                <th>End</th>
                <th>Amount on the 1st</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        @foreach($budgets as $budget)
            <tr>
                <td>{{ $budget->name }}</td>
                <td>{{ $budget->start->toFormattedDateString() }}</td>
                <td>{{ $budget->end->toFormattedDateString() }}</td>
                <td>{{ $budget->bank_start }}</td>
                <td><a href="{{ route('budget_show', ['budget' => $budget]) }}" class="btn btn-sm btn-primary">Edit</a></td>
            </tr>
        @endforeach
    </table>
@endsection