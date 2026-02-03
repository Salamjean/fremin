<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::ordered()->get();
        return view('admin.accueil.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.accueil.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['logo', 'is_active']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Partner::create($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire ajouté avec succès.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.accueil.partners.create', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['logo', 'is_active']);

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $partner->update($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire mis à jour avec succès.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
            Storage::disk('public')->delete($partner->logo);
        }
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire supprimé avec succès.');
    }

    public function toggleStatus(Partner $partner)
    {
        $partner->is_active = !$partner->is_active;
        $partner->save();

        return response()->json(['success' => true, 'is_active' => $partner->is_active]);
    }
}
