@extends('layouts.admin')

@section('title', 'Advisors')

@section('content')
<div class="container">
    <h2>All Advisors</h2>
    <a href="{{ route('advisors.create') }}" class="btn btn-primary mb-3">Add Advisor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($advisors as $advisor)
                <tr>
                    <td>{{ $advisor->company->name }}</td>
                    <td>{{ $advisor->name }}</td>
                    <td>{{ $advisor->email }}</td>
                    <td>{{ $advisor->phone }}</td>
                    <td>
                        <a href="{{ route('advisors.edit', $advisor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('advisors.destroy', $advisor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
