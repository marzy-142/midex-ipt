@extends('layouts.app')

@section('title', 'Add a New Pet')

@section('content')
    <h2>Add a New Pet</h2>

    <form action="{{ route('records.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Pet Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="species" class="form-label">Species</label>
            <input type="text" name="species" id="species" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="owner_name" class="form-label">Owner's Name</label>
            <input type="text" name="owner_name" id="owner_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="medical_history" class="form-label">Medical History</label>
            <textarea name="medical_history" id="medical_history" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Pet</button>
        <a href="{{ route('records.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
