<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\MissionCard;
use Illuminate\Http\Request;

class MissionCardController extends Controller
{
    public function index()
    {
        $missionCards = MissionCard::ordered()->get();
        return view('admin.accueil.missions.index', compact('missionCards'));
    }

    public function create()
    {
        return view('admin.accueil.missions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'content' => 'nullable|string',
            'content_en' => 'nullable|string',
            'list_items' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'theme' => 'required|in:orange,green,dark',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Convert list_items string (newline separated) to array
        if ($request->filled('list_items')) {
            $data['list_items'] = array_filter(array_map('trim', explode("\n", $request->list_items)));
        } else {
            $data['list_items'] = [];
        }

        $data['is_active'] = $request->has('is_active');

        MissionCard::create($data);

        return redirect()->route('admin.mission-cards.index')
            ->with('success', 'Carte Mission créée avec succès.');
    }

    public function edit(MissionCard $missionCard)
    {
        // Convert list_items array to newline separated string for the textarea
        $missionCard->list_items_string = implode("\n", $missionCard->list_items ?? []);
        return view('admin.accueil.missions.create', compact('missionCard'));
    }

    public function update(Request $request, MissionCard $missionCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'content' => 'nullable|string',
            'content_en' => 'nullable|string',
            'list_items' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'theme' => 'required|in:orange,green,dark',
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

        $missionCard->update($data);

        return redirect()->route('admin.mission-cards.index')
            ->with('success', 'Carte Mission mise à jour avec succès.');
    }

    public function destroy(MissionCard $missionCard)
    {
        $missionCard->delete();

        return redirect()->route('admin.mission-cards.index')
            ->with('success', 'Carte Mission supprimée avec succès.');
    }

    public function toggleStatus(MissionCard $missionCard)
    {
        $missionCard->is_active = !$missionCard->is_active;
        $missionCard->save();

        return response()->json(['success' => true, 'is_active' => $missionCard->is_active]);
    }
}
