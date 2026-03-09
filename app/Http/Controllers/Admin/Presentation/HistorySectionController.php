<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HistorySection;

class HistorySectionController extends Controller
{
    public function index()
    {
        $histories = HistorySection::all();
        return view('admin.presentation.history.index', compact('histories'));
    }

    public function create()
    {
        return view('admin.presentation.history.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle presidents list
        $presidents = [];
        if ($request->has('president_names')) {
            foreach ($request->president_names as $key => $name) {
                if ($name) {
                    $presidents[] = [
                        'name' => $name,
                        'period' => $request->president_periods[$key] ?? ''
                    ];
                }
            }
        }
        $data['presidents'] = $presidents;

        HistorySection::create($data);

        return redirect()->route('admin.history-sections.index')
            ->with('success', 'Historique ajouté avec succès.');
    }

    public function edit(HistorySection $historySection)
    {
        $history = $historySection;
        return view('admin.presentation.history.form', compact('history'));
    }

    public function update(Request $request, HistorySection $historySection)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle presidents list
        $presidents = [];
        if ($request->has('president_names')) {
            foreach ($request->president_names as $key => $name) {
                if ($name) {
                    $presidents[] = [
                        'name' => $name,
                        'period' => $request->president_periods[$key] ?? ''
                    ];
                }
            }
        }
        $data['presidents'] = $presidents;

        $historySection->update($data);

        return redirect()->route('admin.history-sections.index')
            ->with('success', 'Historique mis à jour avec succès.');
    }

    public function destroy(HistorySection $historySection)
    {
        $historySection->delete();
        return redirect()->route('admin.history-sections.index')
            ->with('success', 'Historique supprimé avec succès.');
    }

    public function toggleStatus(HistorySection $historySection)
    {
        $historySection->is_active = !$historySection->is_active;
        $historySection->save();
        return response()->json(['success' => true]);
    }
}
