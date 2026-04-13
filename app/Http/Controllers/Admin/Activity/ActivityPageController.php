<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Models\ActivityPage;
use Illuminate\Http\Request;

class ActivityPageController extends Controller
{
    public function index()
    {
        $pages = ActivityPage::orderBy('id')->get();
        return view('admin.activity.pages.index', compact('pages'));
    }

    public function edit(ActivityPage $activityPage)
    {
        return view('admin.activity.pages.form', compact('activityPage'));
    }

    public function update(Request $request, ActivityPage $activityPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'items' => 'nullable|array',
            'metadata' => 'nullable|array',
            'is_active' => 'nullable', // Changé de boolean à nullable car on fait un has() plus bas
        ]);

        $data = $request->except(['items', 'is_active']);
        $items = $request->input('items', []);
        
        // Gérer les uploads pour chaque item (notation par points pour les fichiers imbriqués)
        foreach ($items as $index => $item) {
            if ($request->hasFile("items.$index.image_uploads")) {
                // Initialiser le tableau d'images si nécessaire
                if (!isset($items[$index]['images'])) {
                    $items[$index]['images'] = [];
                }
                
                foreach ($request->file("items.$index.image_uploads") as $file) {
                    if ($file->isValid()) {
                        $path = $file->store('pages/activities', 'public');
                        $items[$index]['images'][] = $path;
                    }
                }
            }
        }
        
        // On ré-indexe le tableau items pour s'assurer que c'est un tableau JSON [] et non un objet {}
        $data['items'] = array_values($items);
        
        // On nettoie aussi les sous-tableaux images
        foreach ($data['items'] as &$item) {
            if (isset($item['images']) && is_array($item['images'])) {
                $item['images'] = array_values(array_filter($item['images']));
            }
        }

        $data['is_active'] = $request->has('is_active') && $request->is_active == '1';

        $activityPage->update($data);

        return redirect()->route('admin.activity-pages.index')
            ->with('success', 'Page mise à jour avec succès.');
    }
}
