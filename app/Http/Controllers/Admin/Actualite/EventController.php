<?php

namespace App\Http\Controllers\Admin\Actualite;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Liste des événements
    public function index()
    {
        $events = Event::orderBy('event_date')
                      ->orderBy('start_time')
                      ->get();
        
        return view('admin.actualite.events.index', compact('events'));
    }

    // Formulaire de création
    public function create()
    {
        return view('admin.actualite.events.form');
    }

    // Enregistrement d'un nouvel événement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'location_type' => 'required|in:in_person,online,hybrid',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url|max:255',
            'button_class' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'is_featured' => 'boolean'
        ]);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        // Création de l'événement
        $event = Event::create($validated);

        return redirect()->route('admin.events.index')
                        ->with('success', 'Événement créé avec succès!');
    }

    // Formulaire d'édition
    public function edit(Event $event)
    {
        return view('admin.actualite.events.form', compact('event'));
    }

    // Mise à jour d'un événement
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'location_type' => 'required|in:in_person,online,hybrid',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url|max:255',
            'button_class' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'is_featured' => 'boolean'
        ]);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events', 'public');
        } elseif ($request->has('remove_image')) {
            // Supprimer l'image
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
                $validated['image'] = null;
            }
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')
                        ->with('success', 'Événement mis à jour avec succès!');
    }

    // Suppression d'un événement
    public function destroy(Event $event)
    {
        // Supprimer l'image si elle existe
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
                        ->with('success', 'Événement supprimé avec succès!');
    }

    // Basculer le statut actif/inactif
    public function toggleStatus(Event $event)
    {
        $event->update(['is_active' => !$event->is_active]);
        
        $status = $event->is_active ? 'activé' : 'désactivé';
        return redirect()->route('admin.events.index')
                        ->with('success', "Événement {$status} avec succès!");
    }

    // Basculer le statut vedette
    public function toggleFeatured(Event $event)
    {
        $event->update(['is_featured' => !$event->is_featured]);
        
        $status = $event->is_featured ? 'mis en vedette' : 'retiré de la vedette';
        return redirect()->route('admin.events.index')
                        ->with('success', "Événement {$status} avec succès!");
    }
}