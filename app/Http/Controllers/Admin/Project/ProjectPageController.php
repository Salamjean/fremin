<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectPage;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    public function index()
    {
        $pages = ProjectPage::orderBy('id')->get();
        return view('admin.project.pages.index', compact('pages'));
    }

    public function edit(ProjectPage $projectPage)
    {
        return view('admin.project.pages.form', compact('projectPage'));
    }

    public function update(Request $request, ProjectPage $projectPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'realisations' => 'nullable|array',
            'media' => 'nullable|array',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $media = $request->input('media', []);
        
        // Gérer les images existantes pour ne pas les perdre
        $gallery = isset($media['gallery']) ? (array)$media['gallery'] : [];
        
        // Gérer les nouveaux uploads
        if ($request->hasFile('gallery_uploads')) {
            foreach ($request->file('gallery_uploads') as $file) {
                if ($file->isValid()) {
                    $path = $file->store('pages/projects', 'public');
                    $gallery[] = $path;
                }
            }
        }
        
        $data['media'] = $media; // On s'assure que media est bien dans data
        $data['media']['gallery'] = array_values(array_filter($gallery));
        $data['is_active'] = $request->has('is_active');

        $projectPage->update($data);

        return redirect()->route('admin.project-pages.index')
            ->with('success', 'Page mise à jour avec succès.');
    }
}
