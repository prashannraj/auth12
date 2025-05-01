@extends('layouts.admin')

@section('content')
    <h1>Branches List</h1>

    {{-- Success message --}}
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add button --}}
    <a href="{{ route('branches.create') }}">Add New Branch</a>

    {{-- Branch table --}}
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Manager</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($branches as $branch)
                <tr>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->manager }}</td>
                    <td>{{ $branch->location }}</td>
                    <td>
                        <a href="{{ route('branches.show', $branch->id) }}">View</a> |
                        <a href="{{ route('branches.edit', $branch->id) }}">Edit</a> |
                        <a href="{{ route('branches.confirmDelete', $branch->id) }}" style="color: red;">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No branches found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
