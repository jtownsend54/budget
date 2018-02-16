@extends('layout')

@section('content_title') Create Budget @endsection

@section('content')
    <form method="post" action="{{ route('budget_store') }}" class="form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="start">Start</label>
            <input type="text" name="start" class="form-control">
        </div>
        <div class="form-group">
            <label for="end">End</label>
            <input type="text" name="end" class="form-control">
        </div>
        <div class="form-group">
            <label for="last_month">From Last Month</label>
            <input type="text" name="from_last_month" class="form-control">
        </div>
        <div class="form-group">
            <label for="this_month">Added to this Month</label>
            <input type="text" name="added_this_month" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection