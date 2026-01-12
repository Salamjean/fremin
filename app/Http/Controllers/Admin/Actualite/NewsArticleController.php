<?php

namespace App\Http\Controllers\Admin\Actualite;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsArticleController extends Controller
{
    // Afficher tous les articles
    public function index()
    {
        $articles = NewsArticle::orderBy('sort_order')->get();
        return view('admin.actualite.news.index', compact('articles'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.actualite.news.create');
    }

    // Enregistrer un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'category' => 'required|string|max:50',
            'category_color' => 'nullable|string|max:50',
            'date' => 'required|date',
            'type' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'views' => 'nullable|integer|min:0',
            'link' => 'nullable|url|max:255',
            'link_text' => 'nullable|string|max:100',
            'is_event' => 'boolean',
            'event_date' => 'nullable|required_if:is_event,true|date',
            'event_registrations' => 'nullable|integer|min:0',
            'event_button_text' => 'nullable|string|max:50',
            'event_button_icon' => 'nullable|string|max:50',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Gestion de l'upload de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');
        $data['is_event'] = $request->has('is_event');
        $data['views'] = $request->get('views', 0);
        $data['event_registrations'] = $request->get('event_registrations', 0);

        NewsArticle::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Article créé avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit(NewsArticle $news)
    {
        return view('admin.actualite.news.edit', compact('news'));
    }

    // Mettre à jour un article
    public function update(Request $request, NewsArticle $news)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'category' => 'required|string|max:50',
            'category_color' => 'nullable|string|max:50',
            'date' => 'required|date',
            'type' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'views' => 'nullable|integer|min:0',
            'link' => 'nullable|url|max:255',
            'link_text' => 'nullable|string|max:100',
            'is_event' => 'boolean',
            'event_date' => 'nullable|required_if:is_event,true|date',
            'event_registrations' => 'nullable|integer|min:0',
            'event_button_text' => 'nullable|string|max:50',
            'event_button_icon' => 'nullable|string|max:50',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Gestion de l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            $path = $request->file('image')->store('news', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');
        $data['is_event'] = $request->has('is_event');
        $data['views'] = $request->get('views', $news->views);
        $data['event_registrations'] = $request->get('event_registrations', $news->event_registrations);

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Article mis à jour avec succès.');
    }

    // Supprimer un article
    public function destroy(NewsArticle $news)
    {
        // Supprimer l'image si elle existe
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Article supprimé avec succès.');
    }

    // Activer/désactiver un article
    public function toggleStatus(NewsArticle $news)
    {
        $news->update(['is_active' => !$news->is_active]);

        return redirect()->route('admin.news.index')
            ->with('success', $news->is_active ? 'Article activé.' : 'Article désactivé.');
    }

    // Basculer le statut d'événement
    public function toggleEventStatus(NewsArticle $news)
    {
        $news->update(['is_event' => !$news->is_event]);

        return redirect()->route('admin.news.index')
            ->with('success', $news->is_event ? 'Article marqué comme événement.' : 'Article marqué comme article normal.');
    }
}
