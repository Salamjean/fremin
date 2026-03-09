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

        $projectPage->update($request->all());

        return redirect()->route('admin.project-pages.index')
            ->with('success', 'Page mise à jour avec succès.');
    }
}
