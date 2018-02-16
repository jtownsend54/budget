@extends('layout')

@section('content_title') Budget Categories @endsection

@section('content')
    <a href="{{ route('budget_categories_create') }}" class="btn btn-primary">New</a>
    <br><br>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        @foreach($budgetCategories as $budgetCategory)
            <tr>
                <td>{{ $budgetCategory->name }}</td>
                <td><a href="{{ route('budget_categories_show', ['budgetCategory' => $budgetCategory]) }}" class="btn btn-sm btn-primary">Edit</a></td>
            </tr>
        @endforeach
    </table>
@endsection