<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::ordered()->get();
        return view('admin.accueil.statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.accueil.statistics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Statistic::create($data);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistique créée avec succès.');
    }

    public function edit(Statistic $statistic)
    {
        return view('admin.accueil.statistics.edit', compact('statistic'));
    }

    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $statistic->update($data);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistique mise à jour avec succès.');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistique supprimée avec succès.');
    }

    public function toggleStatus(Statistic $statistic)
    {
        $statistic->is_active = !$statistic->is_active;
        $statistic->save();

        return response()->json(['success' => true, 'is_active' => $statistic->is_active]);
    }
}
