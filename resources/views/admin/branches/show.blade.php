@extends('layouts.admin')

@section('content')
    <h1>Branch Details</h1>

    <p><strong>ID:</strong> {{ $branch->id }}</p>
    <p><strong>Name:</strong> {{ $branch->name }}</p>
    <p><strong>Address:</strong> {{ $branch->address }}</p>
    <p><strong>Email:</strong> {{ $branch->email }}</p>
    <p><strong>Manager:</strong> {{ $branch->manager }}</p>

    <a href="{{ route('admin.branches.index') }}">Back to List</a>
@endsection
