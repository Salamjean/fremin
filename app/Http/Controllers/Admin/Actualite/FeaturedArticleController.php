<?php

namespace App\Http\Controllers\Admin\Actualite;

use App\Http\Controllers\Controller;
use App\Models\FeaturedArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturedArticleController extends Controller
{
    // Afficher tous les articles
    public function index()
    {
        $articles = FeaturedArticle::orderBy('sort_order')->get();
        return view('admin.actualite.featured-articles.index', compact('articles'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.actualite.featured-articles.create');
    }

    // Enregistrer un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'badge_text' => 'nullable|string|max:50',
            'badge_icon' => 'nullable|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:50',
            'publication_date' => 'required|date',
            'views' => 'nullable|integer|min:0',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'read_more_text' => 'nullable|string|max:100',
            'read_more_link' => 'nullable|url|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Gestion de l'upload de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('featured-articles', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');
        $data['views'] = $request->get('views', 0);

        FeaturedArticle::create($data);

        return redirect()->route('admin.featured-articles.index')
            ->with('success', 'Article "À la Une" créé avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit(FeaturedArticle $featuredArticle)
    {
        return view('admin.actualite.featured-articles.edit', compact('featuredArticle'));
    }

    // Mettre à jour un article
    public function update(Request $request, FeaturedArticle $featuredArticle)
    {
        $request->validate([
            'badge_text' => 'nullable|string|max:50',
            'badge_icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:50',
            'publication_date' => 'required|date',
            'views' => 'nullable|integer|min:0',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'read_more_text' => 'nullable|string|max:100',
            'read_more_link' => 'nullable|url|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Gestion de l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($featuredArticle->image && Storage::disk('public')->exists($featuredArticle->image)) {
                Storage::disk('public')->delete($featuredArticle->image);
            }

            $path = $request->file('image')->store('featured-articles', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');
        $data['views'] = $request->get('views', $featuredArticle->views);

        $featuredArticle->update($data);

        return redirect()->route('admin.featured-articles.index')
            ->with('success', 'Article "À la Une" mis à jour avec succès.');
    }

    // Supprimer un article
    public function destroy(FeaturedArticle $featuredArticle)
    {
        // Supprimer l'image si elle existe
        if ($featuredArticle->image && Storage::disk('public')->exists($featuredArticle->image)) {
            Storage::disk('public')->delete($featuredArticle->image);
        }

        $featuredArticle->delete();

        return redirect()->route('admin.featured-articles.index')
            ->with('success', 'Article "À la Une" supprimé avec succès.');
    }

    // Activer/désactiver un article
    public function toggleStatus(FeaturedArticle $featuredArticle)
    {
        $featuredArticle->update(['is_active' => !$featuredArticle->is_active]);

        return redirect()->route('admin.featured-articles.index')
            ->with('success', $featuredArticle->is_active ? 'Article activé.' : 'Article désactivé.');
    }
}
