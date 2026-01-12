<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccueilController extends Controller
{
    // Afficher la liste des carousels
    public function index()
    {
        $carousels = Carousel::ordered()->get();
        return view('admin.accueil.carousels.index', compact('carousels'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.accueil.carousels.create');
    }

    // Enregistrer un nouveau carousel
    public function store(Request $request)
    {
        $request->validate([
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'layout' => 'required|in:left,right',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Gestion de l'upload de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('carousels', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');

        Carousel::create($data);

        return redirect()->route('admin.carousels.index')
            ->with('success', 'Carousel créé avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit(Carousel $carousel)
    {
        return view('admin.accueil.carousels.edit', compact('carousel'));
    }

    // Mettre à jour un carousel
    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'layout' => 'required|in:left,right',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Gestion de l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($carousel->image && Storage::disk('public')->exists($carousel->image)) {
                Storage::disk('public')->delete($carousel->image);
            }

            $path = $request->file('image')->store('carousels', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');

        $carousel->update($data);

        return redirect()->route('admin.carousels.index')
            ->with('success', 'Carousel mis à jour avec succès.');
    }

    // Supprimer un carousel
    public function destroy(Carousel $carousel)
    {
        // Supprimer l'image si elle existe
        if ($carousel->image && Storage::disk('public')->exists($carousel->image)) {
            Storage::disk('public')->delete($carousel->image);
        }

        $carousel->delete();

        return redirect()->route('admin.carousels.index')
            ->with('success', 'Carousel supprimé avec succès.');
    }
}