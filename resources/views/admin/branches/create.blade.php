@extends('layouts.admin')

@section('content')
    <h1>Create New Branch</h1>

    {{-- Flash success message --}}
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        @php
        // Get the default company (ID = 1)
        $defaultCompany = \App\Models\CompanyInfo::find(1);
    @endphp

    <form action="{{ route('branches.store') }}" method="POST">

        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}"><br>

        <label>Address:</label>
        <input type="text" name="address" value="{{ old('address') }}"><br>

        <label>Telephone:</label>
        <input type="text" name="phone" value="{{ old('phone') }}"><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}"><br>

        <label>Manager:</label>
        <input type="text" name="manager" value="{{ old('manager') }}"><br>

        <label>Location:</label>
        <input type="text" name="location" value="{{ old('location') }}"><br>

        <label>Company:</label>
        <input type="text" value="{{ $defaultCompany->name ?? 'N/A' }}" disabled>
        <input type="hidden" name="company_info_id" value="{{ $defaultCompany->id ?? 1 }}">

        <button type="submit">Save</button>
    </form>
@endsection
