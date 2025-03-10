@extends('layouts.app')

@section('title', 'Pets List')

@section('content')
    <h2>Pets List</h2>

    @can('create records')
        <a href="{{ route('records.create') }}" class="btn btn-primary mb-3">Add New Pet</a>
    @endcan

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pet Name</th>
                <th>Species</th>
                <th>Age</th>
                <th>Owner</th>
                <th>Medical History</th>
                @if(auth()->user() && auth()->user()->hasAnyPermission(['edit records', 'delete records']))
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($records as $pet)
                <tr>
                    <td>{{ $pet->id }}</td>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->species }}</td>
                    <td>{{ $pet->age }}</td>
                    <td>{{ $pet->owner_name }}</td>
                    <td>{{ $pet->medical_history ?: 'N/A' }}</td>
                    @if(auth()->user())
                        <td>
                            @can('edit records')
                                <a href="{{ route('records.edit', $pet->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endcan

                            @can('delete records')
                                <form action="{{ route('records.destroy', $pet->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endcan
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
