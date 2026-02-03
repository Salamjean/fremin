<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\GovernanceCard;
use Illuminate\Http\Request;

class GovernanceCardController extends Controller
{
    public function index()
    {
        $governanceCards = GovernanceCard::ordered()->get();
        return view('admin.accueil.governance.index', compact('governanceCards'));
    }

    public function create()
    {
        return view('admin.accueil.governance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'list_items' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->filled('list_items')) {
            $data['list_items'] = array_filter(array_map('trim', explode("\n", $request->list_items)));
        } else {
            $data['list_items'] = [];
        }

        $data['is_active'] = $request->has('is_active');

        GovernanceCard::create($data);

        return redirect()->route('admin.governance-cards.index')
            ->with('success', 'Carte Gouvernance créée avec succès.');
    }

    public function edit(GovernanceCard $governanceCard)
    {
        $governanceCard->list_items_string = implode("\n", $governanceCard->list_items ?? []);
        return view('admin.accueil.governance.create', compact('governanceCard'));
    }

    public function update(Request $request, GovernanceCard $governanceCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'list_items' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->filled('list_items')) {
            $data['list_items'] = array_filter(array_map('trim', explode("\n", $request->list_items)));
        } else {
            $data['list_items'] = [];
        }

        $data['is_active'] = $request->has('is_active');

        $governanceCard->update($data);

        return redirect()->route('admin.governance-cards.index')
            ->with('success', 'Carte Gouvernance mise à jour avec succès.');
    }

    public function destroy(GovernanceCard $governanceCard)
    {
        $governanceCard->delete();

        return redirect()->route('admin.governance-cards.index')
            ->with('success', 'Carte Gouvernance supprimée avec succès.');
    }

    public function toggleStatus(GovernanceCard $governanceCard)
    {
        $governanceCard->is_active = !$governanceCard->is_active;
        $governanceCard->save();

        return response()->json(['success' => true, 'is_active' => $governanceCard->is_active]);
    }
}
