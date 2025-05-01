@extends('layouts.admin')

@section('content')
    <h1>Confirm Delete</h1>

    <p>Are you sure you want to delete the branch: <strong>{{ $branch->name }}</strong>?</p>

    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: red;">Yes, Delete</button>
        <a href="{{ route('branches.index') }}">Cancel</a>
    </form>
@endsection
