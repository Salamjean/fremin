<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    // Afficher toutes les sections about
    public function index()
    {
        $aboutSections = AboutSection::orderBy('sort_order')->get();
        return view('admin.presentation.about.index', compact('aboutSections'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.presentation.about.create');
    }

    // Enregistrer une nouvelle section about
    public function store(Request $request)
    {
        $request->validate([
            'section_title' => 'nullable|string|max:100',
            'section_subtitle' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'main_image_alt' => 'nullable|string|max:255',
            'content_title' => 'nullable|string|max:100',
            'content_text' => 'nullable|string',
            'mission_title' => 'nullable|string|max:100',
            'mission_text' => 'nullable|string',
            'mission_icon' => 'nullable|string|max:50',
            'vision_title' => 'nullable|string|max:100',
            'vision_text' => 'nullable|string',
            'vision_icon' => 'nullable|string|max:50',
            'values_title' => 'nullable|string|max:100',
            'values_text' => 'nullable|string',
            'values_icon' => 'nullable|string|max:50',
            'feature1_title' => 'nullable|string|max:100',
            'feature1_text' => 'nullable|string|max:255',
            'feature1_icon' => 'nullable|string|max:50',
            'feature2_title' => 'nullable|string|max:100',
            'feature2_text' => 'nullable|string|max:255',
            'feature2_icon' => 'nullable|string|max:50',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['main_image', 'is_active']);

        // Gestion de l'upload de l'image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('about', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        AboutSection::create($data);

        return redirect()->route('admin.about.index')
            ->with('success', 'Section "Qui sommes-nous" créée avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit(AboutSection $about)
    {
        return view('admin.presentation.about.edit', compact('about'));
    }

    // Mettre à jour une section about
    public function update(Request $request, AboutSection $about)
    {
        $request->validate([
            'section_title' => 'nullable|string|max:100',
            'section_subtitle' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'main_image_alt' => 'nullable|string|max:255',
            'content_title' => 'nullable|string|max:100',
            'content_text' => 'nullable|string',
            'mission_title' => 'nullable|string|max:100',
            'mission_text' => 'nullable|string',
            'mission_icon' => 'nullable|string|max:50',
            'vision_title' => 'nullable|string|max:100',
            'vision_text' => 'nullable|string',
            'vision_icon' => 'nullable|string|max:50',
            'values_title' => 'nullable|string|max:100',
            'values_text' => 'nullable|string',
            'values_icon' => 'nullable|string|max:50',
            'feature1_title' => 'nullable|string|max:100',
            'feature1_text' => 'nullable|string|max:255',
            'feature1_icon' => 'nullable|string|max:50',
            'feature2_title' => 'nullable|string|max:100',
            'feature2_text' => 'nullable|string|max:255',
            'feature2_icon' => 'nullable|string|max:50',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['main_image', 'is_active']);

        // Gestion de l'upload de la nouvelle image
        if ($request->hasFile('main_image')) {
            // Supprimer l'ancienne image si elle existe
            if ($about->main_image && Storage::disk('public')->exists($about->main_image)) {
                Storage::disk('public')->delete($about->main_image);
            }

            $data['main_image'] = $request->file('main_image')->store('about', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $about->update($data);

        return redirect()->route('admin.about.index')
            ->with('success', 'Section "Qui sommes-nous" mise à jour avec succès.');
    }

    // Supprimer une section about
    public function destroy(AboutSection $about)
    {
        // Supprimer l'image si elle existe
        if ($about->main_image && Storage::disk('public')->exists($about->main_image)) {
            Storage::disk('public')->delete($about->main_image);
        }

        $about->delete();

        return redirect()->route('admin.about.index')
            ->with('success', 'Section "Qui sommes-nous" supprimée avec succès.');
    }

    // Activer/désactiver une section
    public function toggleStatus(AboutSection $about)
    {
        if ($about->is_active) {
            $about->update(['is_active' => false]);
            $message = 'Section désactivée.';
        } else {
            AboutSection::where('is_active', true)->update(['is_active' => false]);
            $about->update(['is_active' => true]);
            $message = 'Section activée.';
        }

        return redirect()->route('admin.about.index')
            ->with('success', $message);
    }
}
