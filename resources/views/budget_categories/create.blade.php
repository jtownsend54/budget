@extends('layout')

@section('content_title') Create Budget Category @endsection

@section('content')
    <form method="post" action="{{ route('budget_categories_store') }}" class="form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection