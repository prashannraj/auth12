<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branches.index', compact('branches'));
    }

    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.branches.show', compact('branch'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'manager' => 'nullable|string|max:255',
            'location' => 'nullable|string',
            'company_info_id' => 'nullable|integer',
        ]);

        Branch::create($validated);

        return redirect()->route('admin.branches.index')->with('success', 'Branch created successfully.');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'manager' => 'nullable|string|max:255',
            'location' => 'nullable|string',
            'company_info_id' => 'nullable|integer',
        ]);

        $branch->update($validated);

        return redirect()->route('admin.branches.index')->with('success', 'Branch updated successfully.');
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();

        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $branches = Branch::where('name', 'like', "%{$query}%")
                          ->orWhere('manager', 'like', "%{$query}%")
                          ->get();

        return view('admin.branches.search', compact('query', 'branches'));
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $branches = Branch::where('location', $filter)->get();

        return view('admin.branches.filter', compact('filter', 'branches'));
    }

    public function sort(Request $request)
    {
        $sort = $request->input('sort', 'name');
        $branches = Branch::orderBy($sort)->get();

        return view('admin.branches.sort', compact('sort', 'branches'));
    }

    public function paginate(Request $request)
    {
        $branches = Branch::paginate(10);
        return view('admin.branches.paginate', compact('branches'));
    }

    public function export(Request $request)
    {
        // Example JSON export logic
        $branches = Branch::all();
        return response()->json($branches);
    }

    public function import(Request $request)
    {
        // Example import placeholder (should process CSV or Excel file)
        return response()->json(['message' => 'Import successful']);
    }

    public function generateReport(Request $request)
    {
        // Placeholder: generate summary
        $count = Branch::count();
        return response()->json(['message' => "Total branches: $count"]);
    }
    public function confirmDelete($id)
{
    $branch = Branch::findOrFail($id);
    return view('admin.branches.confirm-delete', compact('branch'));
}

}
