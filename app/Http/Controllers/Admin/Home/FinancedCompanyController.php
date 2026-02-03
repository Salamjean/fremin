<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\FinancedCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinancedCompanyController extends Controller
{
    public function index()
    {
        $companies = FinancedCompany::orderBy('sort_order', 'asc')->get();
        return view('admin.accueil.financed_companies.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.accueil.financed_companies.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'image_before' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_after' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['image_before', 'image_after', 'is_active']);

        if ($request->hasFile('image_before')) {
            $data['image_before'] = $request->file('image_before')->store('financed-companies', 'public');
        }

        if ($request->hasFile('image_after')) {
            $data['image_after'] = $request->file('image_after')->store('financed-companies', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        FinancedCompany::create($data);

        return redirect()->route('admin.financed-companies.index')
            ->with('success', 'Entreprise financée ajoutée avec succès.');
    }

    public function edit(FinancedCompany $financedCompany)
    {
        $company = $financedCompany;
        return view('admin.accueil.financed_companies.form', compact('company'));
    }

    public function update(Request $request, FinancedCompany $financedCompany)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'image_before' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_after' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['image_before', 'image_after', 'is_active']);

        if ($request->hasFile('image_before')) {
            if ($financedCompany->image_before && Storage::disk('public')->exists($financedCompany->image_before)) {
                Storage::disk('public')->delete($financedCompany->image_before);
            }
            $data['image_before'] = $request->file('image_before')->store('financed-companies', 'public');
        }

        if ($request->hasFile('image_after')) {
            if ($financedCompany->image_after && Storage::disk('public')->exists($financedCompany->image_after)) {
                Storage::disk('public')->delete($financedCompany->image_after);
            }
            $data['image_after'] = $request->file('image_after')->store('financed-companies', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $financedCompany->update($data);

        return redirect()->route('admin.financed-companies.index')
            ->with('success', 'Entreprise financée mise à jour avec succès.');
    }

    public function destroy(FinancedCompany $financedCompany)
    {
        if ($financedCompany->image_before) {
            Storage::disk('public')->delete($financedCompany->image_before);
        }
        if ($financedCompany->image_after) {
            Storage::disk('public')->delete($financedCompany->image_after);
        }
        $financedCompany->delete();

        return redirect()->route('admin.financed-companies.index')
            ->with('success', 'Entreprise financée supprimée avec succès.');
    }

    public function toggleStatus(FinancedCompany $financedCompany)
    {
        $financedCompany->is_active = !$financedCompany->is_active;
        $financedCompany->save();

        return response()->json(['success' => true]);
    }
}
