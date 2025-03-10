@extends('layouts.app')

@section('title', 'Edit Pet Record')

@section('content')
    <h2>Edit Pet Record</h2>

    <form action="{{ route('records.update', $pet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Pet Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $pet->name }}" required>
        </div>

        <div class="mb-3">
            <label for="species" class="form-label">Species</label>
            <input type="text" name="species" id="species" class="form-control" value="{{ $pet->species }}" required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $pet->age }}" required>
        </div>

        <div class="mb-3">
            <label for="owner_name" class="form-label">Owner</label>
            <input type="text" name="owner_name" id="owner_name" class="form-control" value="{{ $pet->owner_name }}" required>
        </div>

        <div class="mb-3">
            <label for="medical_history" class="form-label">Medical History</label>
            <textarea name="medical_history" id="medical_history" class="form-control">{{ $pet->medical_history }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Record</button>
        <a href="{{ route('records.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
