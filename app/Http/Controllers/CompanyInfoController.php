<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyInfo;

class CompanyInfoController extends Controller
{
    public function index()
    {
        return response()->json(CompanyInfo::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'footnote' => 'nullable|string',
            'address' => 'nullable|string|max:500',
            'registration_no' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|string|max:255',
            'stamp' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'registered_in' => 'nullable|string|max:100',
            'regulated_by' => 'nullable|string|max:255',
            'regulator_logo' => 'nullable|string|max:255',
            'regulation_no' => 'nullable|string|max:100',
            'vat' => 'nullable|string|max:100',
            // Add more validation as needed
        ]);

        $company = CompanyInfo::create($validated);
        return response()->json($company, 201);
    }

    public function show(CompanyInfo $companyInfo)
    {
        return response()->json($companyInfo);
    }

    public function update(Request $request, CompanyInfo $companyInfo)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'footnote' => 'sometimes|nullable|string',
            'address' => 'sometimes|nullable|string|max:500',
            'registration_no' => 'sometimes|nullable|string|max:100',
            'website' => 'sometimes|nullable|url|max:255',
            'logo' => 'sometimes|nullable|string|max:255',
            'stamp' => 'sometimes|nullable|string|max:255',
            'telephone' => 'sometimes|nullable|string|max:50',
            'email' => 'sometimes|nullable|email|max:255',
            'registered_in' => 'sometimes|nullable|string|max:100',
            'regulated_by' => 'sometimes|nullable|string|max:255',
            'regulator_logo' => 'sometimes|nullable|string|max:255',
            'regulation_no' => 'sometimes|nullable|string|max:100',
            'vat' => 'sometimes|nullable|string|max:100',
            // Add more validation as needed
        ]);

        $companyInfo->update($validated);
        return response()->json($companyInfo);
    }

    public function destroy(CompanyInfo $companyInfo)
    {
        $companyInfo->delete();
        return response()->json(null, 204);
    }
}
