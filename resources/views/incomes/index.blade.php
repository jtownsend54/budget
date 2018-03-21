@extends('layout')

@section('content_title') Income @endsection

@section('content')
    <a href="{{ route('income_create') }}" class="btn btn-primary">New</a>
    <br><br>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Added</th>
                <th>Amount</th>
                <th>Source</th>
                <th>Budget</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        @foreach($incomes as $income)
            <tr>
                <td>{{ $income->created_at->toFormattedDateString() }}</td>
                <td>${{ $income->amount }}</td>
                <td>{{ $income->source }}</td>
                <td>{{ $income->budget->name }}</td>
                <td><a href="{{ route('income_show', ['income' => $income]) }}" class="btn btn-sm btn-primary">Edit</a></td>
            </tr>
        @endforeach
    </table>
@endsection