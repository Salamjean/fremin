<?php

namespace App\Http\Controllers\Admin\Publication;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    // Liste des publications
    public function index()
    {
        $publications = Publication::orderBy('publication_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.publications.rapports.index', compact('publications'));
    }

    // Formulaire de création
    public function create()
    {
        return view('admin.publications.rapports.form');
    }

    public function store(Request $request)
    {
        Log::info('Début de la méthode store() pour la création d\'une publication');
        Log::info('Données reçues:', $request->all());
        Log::info('Fichiers reçus:', $request->hasFile('file') ? ['file' => 'présent'] : ['file' => 'absent']);
        Log::info('Files array:', $_FILES);

        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'type' => 'required|in:rapport,etude,guide,brochure,autre',
                'file' => 'required|file|mimes:pdf|max:10240',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'thumbnail_alt' => 'nullable|string|max:255',
                'page_count' => 'nullable|integer|min:1',
                'file_size' => 'nullable|string|max:20',
                'file_format' => 'nullable|string|max:10',
                'publication_date' => 'required|date',
                'period' => 'nullable|string|max:50',
                'language' => 'nullable|string|max:10',
                'isbn' => 'nullable|string|max:50',
                'author' => 'nullable|string|max:255',
                'is_published' => 'boolean',
                'is_featured' => 'boolean',
                'is_active' => 'boolean',
                'order' => 'nullable|integer'
            ]);

            Log::info('Validation réussie', $validated);

            // Gestion du fichier PDF - MODIFICATION IMPORTANTE
            // Le fichier est maintenant dans $validated['file'] comme UploadedFile
            if (isset($validated['file']) && $validated['file'] instanceof \Illuminate\Http\UploadedFile) {
                Log::info('Traitement du fichier PDF depuis $validated', [
                    'name' => $validated['file']->getClientOriginalName(),
                    'size' => $validated['file']->getSize(),
                    'mime' => $validated['file']->getMimeType()
                ]);

                $file = $validated['file']; // Utiliser le fichier depuis $validated
                $fileName = time() . '_' . Str::slug($validated['title']) . '.pdf';
                $filePath = $file->storeAs('publications', $fileName, 'public');

                Log::info('Fichier PDF enregistré', [
                    'original_name' => $file->getClientOriginalName(),
                    'stored_name' => $fileName,
                    'path' => $filePath
                ]);

                // Ajouter les informations du fichier à $validated
                $validated['file_path'] = $filePath;
                $validated['file_name'] = $file->getClientOriginalName();
                $validated['file_size'] = $this->formatBytes($file->getSize());
                $validated['file_format'] = 'PDF';

                // Supprimer l'objet UploadedFile du tableau pour éviter les problèmes
                unset($validated['file']);
            } else {
                Log::error('Fichier PDF manquant ou invalide dans $validated');
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['file' => 'Le fichier PDF est invalide.']);
            }

            // Gestion de la miniature
            if ($request->hasFile('thumbnail')) {
                Log::info('Miniature détectée', [
                    'name' => $request->file('thumbnail')->getClientOriginalName(),
                    'size' => $request->file('thumbnail')->getSize(),
                    'mime' => $request->file('thumbnail')->getMimeType()
                ]);

                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time() . '_' . Str::slug($validated['title']) . '_thumb.' . $thumbnail->getClientOriginalExtension();
                $thumbnailPath = $thumbnail->storeAs('publications/thumbnails', $thumbnailName, 'public');

                Log::info('Miniature enregistrée', [
                    'path' => $thumbnailPath
                ]);

                $validated['thumbnail'] = $thumbnailPath;
            } else {
                Log::info('Aucune miniature fournie');
            }

            // S'assurer que les valeurs booléennes sont correctement définies
            $validated['is_published'] = $request->has('is_published') ? true : false;
            $validated['is_featured'] = $request->has('is_featured') ? true : false;
            $validated['is_active'] = $request->has('is_active') ? true : true; // Par défaut actif

            Log::info('Données prêtes pour création', $validated);

            // Création de la publication
            $publication = Publication::create($validated);

            Log::info('Publication créée avec succès', [
                'id' => $publication->id,
                'title' => $publication->title
            ]);

            return redirect()->route('admin.publications.index')
                ->with('success', 'Publication créée avec succès!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Erreur de validation', [
                'errors' => $e->errors(),
                'input' => $request->all()
            ]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la publication', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Une erreur est survenue lors de la création de la publication. ' . $e->getMessage()]);
        }
    }

    // Formulaire d'édition
    public function edit(Publication $publication)
    {
        return view('admin.publications.rapports.form', compact('publication'));
    }

    // Mise à jour d'une publication
    public function update(Request $request, Publication $publication)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:rapport,etude,guide,brochure,autre',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'thumbnail_alt' => 'nullable|string|max:255',
            'page_count' => 'nullable|integer|min:1',
            'file_size' => 'nullable|string|max:20',
            'file_format' => 'nullable|string|max:10',
            'publication_date' => 'required|date',
            'period' => 'nullable|string|max:50',
            'language' => 'nullable|string|max:10',
            'isbn' => 'nullable|string|max:50',
            'author' => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer'
        ]);

        // Gestion du fichier PDF
        if ($request->hasFile('file')) {
            // Supprimer l'ancien fichier
            if ($publication->file_path) {
                Storage::disk('public')->delete($publication->file_path);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($validated['title']) . '.pdf';
            $filePath = $file->storeAs('publications', $fileName, 'public');

            $validated['file_path'] = $filePath;
            $validated['file_name'] = $file->getClientOriginalName();
            $validated['file_size'] = $this->formatBytes($file->getSize());
            $validated['file_format'] = 'PDF';
        }

        // Gestion de la miniature
        if ($request->hasFile('thumbnail')) {
            // Supprimer l'ancienne miniature
            if ($publication->thumbnail) {
                Storage::disk('public')->delete($publication->thumbnail);
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . Str::slug($validated['title']) . '_thumb.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = $thumbnail->storeAs('publications/thumbnails', $thumbnailName, 'public');
            $validated['thumbnail'] = $thumbnailPath;
        } elseif ($request->has('remove_thumbnail')) {
            // Supprimer la miniature
            if ($publication->thumbnail) {
                Storage::disk('public')->delete($publication->thumbnail);
                $validated['thumbnail'] = null;
            }
        }

        // Mise à jour de la publication
        $publication->update($validated);

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication mise à jour avec succès!');
    }

    // Suppression d'une publication
    public function destroy(Publication $publication)
    {
        // Supprimer les fichiers associés
        if ($publication->file_path) {
            Storage::disk('public')->delete($publication->file_path);
        }

        if ($publication->thumbnail) {
            Storage::disk('public')->delete($publication->thumbnail);
        }

        $publication->delete();

        return redirect()->route('admin.publications.index')
            ->with('success', 'Publication supprimée avec succès!');
    }

    // Basculer le statut de publication
    public function toggleStatus(Publication $publication)
    {
        $publication->update(['is_published' => !$publication->is_published]);

        $status = $publication->is_published ? 'publiée' : 'dépubliée';
        return redirect()->route('admin.publications.index')
            ->with('success', "Publication {$status} avec succès!");
    }

    // Basculer le statut vedette
    public function toggleFeatured(Publication $publication)
    {
        $publication->update(['is_featured' => !$publication->is_featured]);

        $status = $publication->is_featured ? 'mise en vedette' : 'retirée de la vedette';
        return redirect()->route('admin.publications.index')
            ->with('success', "Publication {$status} avec succès!");
    }

    // Basculer le statut actif
    public function toggleActive(Publication $publication)
    {
        $publication->update(['is_active' => !$publication->is_active]);

        $status = $publication->is_active ? 'activée' : 'désactivée';
        return redirect()->route('admin.publications.index')
            ->with('success', "Publication {$status} avec succès!");
    }

    // Téléchargement du fichier
    public function download(Publication $publication)
    {
        // Incrémenter le compteur de téléchargements
        $publication->incrementDownloads();

        $filePath = storage_path('app/public/' . $publication->file_path);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Le fichier n\'existe pas.');
        }

        return response()->download($filePath, $publication->file_name);
    }

    // Méthode utilitaire pour formater la taille des fichiers
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function frontIndex()
    {
        $publications = Publication::published()
            ->orderBy('publication_date', 'desc')
            ->paginate(12);

        return view('publications.index', compact('publications'));
    }

    // Vue frontend - Détail d'une publication
    public function frontShow(Publication $publication)
    {
        if (!$publication->is_published || !$publication->is_active) {
            abort(404);
        }

        // Incrémenter les vues
        $publication->incrementViews();

        $relatedPublications = Publication::published()
            ->where('id', '!=', $publication->id)
            ->where('type', $publication->type)
            ->orderBy('publication_date', 'desc')
            ->take(3)
            ->get();

        return view('publications.show', compact('publication', 'relatedPublications'));
    }

    // Suivi des téléchargements
    public function trackDownload(Publication $publication)
    {
        $publication->incrementDownloads();
        return response()->json(['success' => true]);
    }

    // Suivi des vues
    public function trackView(Publication $publication)
    {
        $publication->incrementViews();
        return response()->json(['success' => true]);
    }
}
