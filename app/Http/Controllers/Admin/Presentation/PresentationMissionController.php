<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use App\Models\PresentationMission;
use Illuminate\Http\Request;

class PresentationMissionController extends Controller
{
    public function index()
    {
        $missions = PresentationMission::orderBy('sort_order', 'asc')->get();
        return view('admin.presentation.missions.index', compact('missions'));
    }

    public function create()
    {
        return view('admin.presentation.missions.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        PresentationMission::create($data);

        return redirect()->route('admin.presentation-missions.index')
            ->with('success', 'Mission ajoutée avec succès.');
    }

    public function edit(PresentationMission $presentationMission)
    {
        $mission = $presentationMission;
        return view('admin.presentation.missions.form', compact('mission'));
    }

    public function update(Request $request, PresentationMission $presentationMission)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $presentationMission->update($data);

        return redirect()->route('admin.presentation-missions.index')
            ->with('success', 'Mission mise à jour avec succès.');
    }

    public function destroy(PresentationMission $presentationMission)
    {
        $presentationMission->delete();
        return redirect()->route('admin.presentation-missions.index')
            ->with('success', 'Mission supprimée avec succès.');
    }

    public function toggleStatus(PresentationMission $presentationMission)
    {
        $presentationMission->is_active = !$presentationMission->is_active;
        $presentationMission->save();

        return response()->json(['success' => true]);
    }
}
