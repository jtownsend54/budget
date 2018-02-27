@extends('layout')

@section('content_title') Edit Budget Category @endsection

@section('content')
    <form method="post" action="{{ route('budget_categories_update', ['budgetCategory' => $budgetCategory]) }}" class="form">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $budgetCategory->name }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection