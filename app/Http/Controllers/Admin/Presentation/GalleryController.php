<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Afficher toutes les images de la galerie
    public function index()
    {
        $galleries = Gallery::orderBy('order')->get();
        return view('admin.presentation.gallery.index', compact('galleries'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.presentation.gallery.create');
    }

    // Enregistrer une nouvelle image
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'caption_title' => 'required|string|max:100',
            'caption_text' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Gestion de l'upload de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');

        Gallery::create($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image de galerie ajoutée avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit(Gallery $gallery)
    {
        return view('admin.presentation.gallery.edit', compact('gallery'));
    }

    // Mettre à jour une image
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'caption_title' => 'required|string|max:100',
            'caption_text' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Gestion de l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $path = $request->file('image')->store('gallery', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image de galerie mise à jour avec succès.');
    }

    // Supprimer une image
    public function destroy(Gallery $gallery)
    {
        // Supprimer l'image si elle existe
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image de galerie supprimée avec succès.');
    }

    // Activer/désactiver une image
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->update(['is_active' => !$gallery->is_active]);

        return redirect()->route('admin.gallery.index')
            ->with('success', $gallery->is_active ? 'Image activée.' : 'Image désactivée.');
    }
}
