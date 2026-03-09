<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PresentationGovernance;

class PresentationGovernanceController extends Controller
{
    public function index()
    {
        $governances = PresentationGovernance::orderBy('sort_order', 'asc')->get();
        return view('admin.presentation.governance.index', compact('governances'));
    }

    public function create()
    {
        return view('admin.presentation.governance.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_key' => 'required|string|max:255|unique:presentation_governances',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'content_en' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle items list
        $items = [];
        if ($request->has('list_items')) {
            $items = array_filter($request->list_items);
        }
        $data['items'] = array_values($items);

        PresentationGovernance::create($data);

        return redirect()->route('admin.presentation-governances.index')
            ->with('success', 'Élément de gouvernance ajouté avec succès.');
    }

    public function edit(PresentationGovernance $presentationGovernance)
    {
        $governance = $presentationGovernance;
        return view('admin.presentation.governance.form', compact('governance'));
    }

    public function update(Request $request, PresentationGovernance $presentationGovernance)
    {
        $request->validate([
            'section_key' => 'required|string|max:255|unique:presentation_governances,section_key,' . $presentationGovernance->id,
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle items list
        $items = [];
        if ($request->has('list_items')) {
            $items = array_filter($request->list_items);
        }
        $data['items'] = array_values($items);

        $presentationGovernance->update($data);

        return redirect()->route('admin.presentation-governances.index')
            ->with('success', 'Élément de gouvernance mis à jour avec succès.');
    }

    public function destroy(PresentationGovernance $presentationGovernance)
    {
        $presentationGovernance->delete();
        return redirect()->route('admin.presentation-governances.index')
            ->with('success', 'Élément supprimé avec succès.');
    }

    public function toggleStatus(PresentationGovernance $presentationGovernance)
    {
        $presentationGovernance->is_active = !$presentationGovernance->is_active;
        $presentationGovernance->save();
        return response()->json(['success' => true]);
    }
}
