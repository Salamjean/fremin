<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    // Afficher la liste des membres
    public function index()
    {
        $teamMembers = TeamMember::ordered()->get();
        return view('admin.accueil.team.index', compact('teamMembers'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.accueil.team.create');
    }

    // Enregistrer un nouveau membre
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'bio' => 'nullable|string',
            'is_president' => 'boolean',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['image', 'is_active', 'is_president']);

        // Gestion de l'upload de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team', 'public');
        }

        $data['is_active'] = $request->has('is_active');
        $data['is_president'] = $request->has('is_president');

        TeamMember::create($data);

        return redirect()->route('admin.team.index')
            ->with('success', 'Membre d\'équipe créé avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit(TeamMember $teamMember)
    {
        return view('admin.accueil.team.edit', compact('teamMember'));
    }

    // Mettre à jour un membre
    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'bio' => 'nullable|string',
            'is_president' => 'boolean',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['image', 'is_active', 'is_president']);

        // Gestion de l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {
                Storage::disk('public')->delete($teamMember->image);
            }

            $data['image'] = $request->file('image')->store('team', 'public');
        }

        $data['is_active'] = $request->has('is_active');
        $data['is_president'] = $request->has('is_president');

        $teamMember->update($data);

        return redirect()->route('admin.team.index')
            ->with('success', 'Membre d\'équipe mis à jour avec succès.');
    }

    // Supprimer un membre
    public function destroy(TeamMember $teamMember)
    {
        // Supprimer l'image si elle existe
        if ($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->route('admin.team.index')
            ->with('success', 'Membre d\'équipe supprimé avec succès.');
    }
}