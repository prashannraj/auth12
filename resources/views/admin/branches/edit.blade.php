@extends('layouts.admin')

@section('content')
    <h1>Edit Branch</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $branch->name) }}"><br>

        <label>Address:</label>
        <input type="text" name="address" value="{{ old('address', $branch->address) }}"><br>

        <label>Telephone:</label>
        <input type="text" name="telephone" value="{{ old('telephone', $branch->telephone) }}"><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $branch->email) }}"><br>

        <label>Manager:</label>
        <input type="text" name="manager" value="{{ old('manager', $branch->manager) }}"><br>

        <label>Location:</label>
        <input type="text" name="location" value="{{ old('location', $branch->location) }}"><br>

        <label>Company Info ID:</label>
        <input type="number" name="company_info_id" value="{{ old('company_info_id', $branch->company_info_id) }}"><br>

        <button type="submit">Update</button>
    </form>
@endsection
