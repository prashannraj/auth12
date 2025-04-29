<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advisor;
use App\Models\Company;

class AdvisorController extends Controller
{
    public function index()
    {
        // Logic to fetch and display all advisors
        $advisors = Advisor::with('company')->get();
        return view('advisors.index', compact('advisors'));
    }

    public function show($id)
    {
        // Logic to fetch and display a specific advisor
        return view('advisors.show', ['id' => $id]);
    }

    public function create()
    {
        // Logic to show the form for creating a new advisor
        $companies = Company::all();
        return view('advisors.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'specialization' => 'nullable|string',
        ]);

        Advisor::create($request->all());

        return redirect()->route('advisors.index')->with('success', 'Advisor created successfully.');
    }
    public function edit($id)
    {
        $companies = Company::all();
        return view('advisors.edit', compact('advisor', 'companies'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'specialization' => 'nullable|string',
        ]);

        $advisor->update($request->all());

        return redirect()->route('advisors.index')->with('success', 'Advisor updated successfully.');
    }
    public function destroy(Advisor $advisor)
    {
        $advisor->delete();
        return redirect()->route('advisors.index')->with('success', 'Advisor deleted successfully.');
    }
    public function search(Request $request)
    {
        // Logic to search for advisors
        $query = $request->input('query');
        // Perform search logic
        return view('advisors.search', ['query' => $query]);
    }
    public function filter(Request $request)
    {
        // Logic to filter advisors
        $filter = $request->input('filter');
        // Perform filter logic
        return view('advisors.filter', ['filter' => $filter]);
    }
    public function sort(Request $request)
    {
        // Logic to sort advisors
        $sort = $request->input('sort');
        // Perform sort logic
        return view('advisors.sort', ['sort' => $sort]);
    }
    public function paginate(Request $request)
    {
        // Logic to paginate advisors
        $page = $request->input('page', 1);
        // Perform pagination logic
        return view('advisors.paginate', ['page' => $page]);
    }
    public function export(Request $request)
    {
        // Logic to export advisor data
        $format = $request->input('format');
        // Perform export logic
        return response()->download($filePath);
    }
    public function import(Request $request)
    {
        // Logic to import advisor data
        $file = $request->file('file');
        // Perform import logic
        return redirect()->route('advisors.index');
    }
    public function generateReport(Request $request)
    {
        // Logic to generate a report of advisors
        $reportType = $request->input('report_type');
        // Perform report generation logic
        return view('advisors.report', ['reportType' => $reportType]);
    }
}
