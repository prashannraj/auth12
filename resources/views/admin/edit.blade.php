@extends('layouts.admin')

@section('title', 'Edit Company')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Edit Company Information</h1>

    <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Company Name -->
            <div class="col-md-6 mb-3">
                <label for="name">Company Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}" required>
            </div>

            <!-- Footnote -->
            <div class="col-md-6 mb-3">
                <label for="footnote">Footnote</label>
                <input type="text" name="footnote" class="form-control" value="{{ old('footnote', $company->footnote) }}">
            </div>

            <!-- Address -->
            <div class="col-md-6 mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $company->address) }}">
            </div>

            <!-- Registration Number -->
            <div class="col-md-6 mb-3">
                <label for="registration_no">Registration Number</label>
                <input type="text" name="registration_no" class="form-control" value="{{ old('registration_no', $company->registration_no) }}">
            </div>

            <!-- Website -->
            <div class="col-md-6 mb-3">
                <label for="website">Website</label>
                <input type="url" name="website" class="form-control" value="{{ old('website', $company->website) }}">
            </div>

            <!-- Telephone -->
            <div class="col-md-6 mb-3">
                <label for="telephone">Telephone</label>
                <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $company->telephone) }}">
            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $company->email) }}">
            </div>

            <!-- Registered In -->
            <div class="col-md-6 mb-3">
                <label for="registered_in">Registered In</label>
                <input type="text" name="registered_in" class="form-control" value="{{ old('registered_in', $company->registered_in) }}">
            </div>

            <!-- Regulated By -->
            <div class="col-md-6 mb-3">
                <label for="regulated_by">Regulated By</label>
                <input type="text" name="regulated_by" class="form-control" value="{{ old('regulated_by', $company->regulated_by) }}">
            </div>

            <!-- Regulation Number -->
            <div class="col-md-6 mb-3">
                <label for="regulation_no">Regulation Number</label>
                <input type="text" name="regulation_no" class="form-control" value="{{ old('regulation_no', $company->regulation_no) }}">
            </div>

            <!-- VAT -->
            <div class="col-md-6 mb-3">
                <label for="vat">VAT Number</label>
                <input type="text" name="vat" class="form-control" value="{{ old('vat', $company->vat) }}">
            </div>

            <!-- Logo Upload -->
            <div class="col-md-6 mb-3">
                <label for="logo">Company Logo</label>
                <input type="file" name="logo" class="form-control-file">
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="img-thumbnail mt-2" width="100">
                @endif
            </div>

            <!-- Stamp Upload -->
            <div class="col-md-6 mb-3">
                <label for="stamp">Company Stamp</label>
                <input type="file" name="stamp" class="form-control-file">
                @if($company->stamp)
                    <img src="{{ asset('storage/' . $company->stamp) }}" alt="Stamp" class="img-thumbnail mt-2" width="100">
                @endif
            </div>

            <!-- Regulator Logo Upload -->
            <div class="col-md-6 mb-3">
                <label for="regulator_logo">Regulator Logo</label>
                <input type="file" name="regulator_logo" class="form-control-file">
                @if($company->regulator_logo)
                    <img src="{{ asset('storage/' . $company->regulator_logo) }}" alt="Regulator Logo" class="img-thumbnail mt-2" width="100">
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
</div>
@endsection
