@extends('layouts.admin')

@section('content')
    <h1>Search Results</h1>
    <p>Search query: {{ $query }}</p>
    {{-- Display filtered branches --}}
@endsection
