<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use App\Models\PresentationStat;
use Illuminate\Http\Request;

class PresentationStatController extends Controller
{
    public function index()
    {
        $stats = PresentationStat::orderBy('sort_order', 'asc')->get();
        return view('admin.presentation.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.presentation.stats.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        PresentationStat::create($data);

        return redirect()->route('admin.presentation-stats.index')
            ->with('success', 'Statistique ajoutée avec succès.');
    }

    public function edit(PresentationStat $presentationStat)
    {
        $stat = $presentationStat;
        return view('admin.presentation.stats.form', compact('stat'));
    }

    public function update(Request $request, PresentationStat $presentationStat)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $presentationStat->update($data);

        return redirect()->route('admin.presentation-stats.index')
            ->with('success', 'Statistique mise à jour avec succès.');
    }

    public function destroy(PresentationStat $presentationStat)
    {
        $presentationStat->delete();
        return redirect()->route('admin.presentation-stats.index')
            ->with('success', 'Statistique supprimée avec succès.');
    }

    public function toggleStatus(PresentationStat $presentationStat)
    {
        $presentationStat->is_active = !$presentationStat->is_active;
        $presentationStat->save();

        return response()->json(['success' => true]);
    }
}
